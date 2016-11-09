'use strict';
const colors = require('colors');
const denodeify = require('denodeify');
const co = require('co');
const SSH = require('node-ssh');
const fs = require('fs');
const path = require('path');
const readFile = denodeify(fs.readFile);
const glob = require('glob-fs')({gitignore:true});
const ssh = new SSH();
const log = {
	verbose: msg => console.log(msg),
	info : msg => console.log(colors.magenta(msg)),
	warn : msg => console.log(colors.yellow(msg)),
	success: msg => console.log(colors.green(msg)),
	error: msg => console.log(colors.red(msg))
};

const BASE_DIR = '/var/www/html/wordpress/';
const THEME_FOLDER = 'wp-content/themes/swruk/';
const THEME_BACKUP_FOLDER = 'wp-content/themes/swruk_backup';
const UPLOAD_DIR = '~/swruk/';

let uploadAttempts = 0;


function logResult(result){
	if(result.stderr){
		throw new Error(result.stderr);
		log.error(result.stderr);
	}
	if(result.stdout){
		log.info(result.stdout);
	}
}

function isNotDirectory(file){
	return !fs.statSync(file).isDirectory();
}

function getUploadDetails(file){
	return {
		'Local' : file,
		'Remote' : 'swruk/' + file.split('themes/swruk/')[1]
	}
}

function getFilesToUpload(){
	let files = 'wordpress/wp-content/themes/swruk/**/**';
	return glob.readdirSync(files)
		.map(f => path.resolve(f))
		.filter(isNotDirectory)
		.map(getUploadDetails)
}


function connect(){
	return co(function* (){
		let key = yield readFile(path.resolve('/Users/paul.i.wilson/.ssh/swruk.pem'), {encoding:'utf8'});
		return ssh.connect({
			host: 'ec2-54-194-211-79.eu-west-1.compute.amazonaws.com',
			username: 'ec2-user',
			privateKey: key
		});
	});
}

function renameExisting(ssh){
	return execCommand(ssh, `sudo mv ${THEME_FOLDER} ${THEME_BACKUP_FOLDER}`)
}

function createUploadDirectory(ssh){
	return execCommand(ssh, `mkdir -p ${UPLOAD_DIR}`);
}

function removeUploadDir(ssh){
	return execCommand(ssh, `rm -rf ${UPLOAD_DIR}`);
}

function upload(ssh){
	let files = getFilesToUpload();
	return co(function* (){
		log.verbose('Upload attempt 1');
		let result1 = yield tryUpload(ssh, files);
		if(result1.success) return;
		log.warn(`Failed to upload. ${result1.error.reason}:"${result1.error.message}"  Retrying...`);
		log.verbose('Upload attempt 2');
		let result2 = yield tryUpload(ssh, files);
		if(result2.success) return;
		log.warn(`Failed to upload. ${result1.error.reason}:="${result1.error.message}"`);
		throw result2.error;
	});
}

function tryUpload(ssh, files){
	return ssh.putMulti(files)
		.then(() => {
			return {success:true}
		})
		.catch(err => {
			return {success:false, error:err}
		});
}

function execCommand(ssh, cmd){
	log.verbose('exec ' + cmd);
	return ssh.execCommand(cmd, {cwd:BASE_DIR, stream:'both'})
		.then(logResult);
}

function moveUploadFolder(ssh){
	return execCommand(ssh, `sudo cp -r ~/swruk/ ${THEME_FOLDER}`)
}

function removeBackup(ssh){
	return execCommand(ssh, `sudo rm -rf ${THEME_BACKUP_FOLDER}`);
}



function bail(ssh){
	return co(function* (){
		log.warn('Something went wrong, bailing...');
		// yield execCommand(ssh, `rm -rf ${UPLOAD_DIR}`);
		// log.info('Removed Upload Directory');
		// yield execCommand(ssh, `mv ${THEME_BACKUP_FOLDER} ${THEME_FOLDER}`);
		// log.info('restored backup');
	}).catch(err => {
		log.error('BAIL FAILED');
		log.error(err.stack);
	})
}


function run(){
	var ssh;
	return co(function* (){
		ssh = yield connect();
		log.info('Connected to remote');
		yield createUploadDirectory(ssh);
		yield upload(ssh);
		log.info('uploaded files');
		yield renameExisting(ssh);
		log.info('Created Backup');
		yield moveUploadFolder(ssh);
		log.info('Upload moved to the the themes folder');
		yield removeBackup(ssh);
		yield removeUploadDir(ssh);
		log.success('Deployed! ☺');
		ssh.end();
	})
		.catch(err => {
			bail(ssh);
			ssh.end();
			throw err;
		})
		.catch(err => {
			log.error(err.stack);
			process.exit(1);
		})
}

run();
