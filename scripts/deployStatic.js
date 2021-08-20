'use strict';
require('dotenv').load();
const AWS = require('aws-sdk');
const fs = require('fs');
const path = require('path');
const colors = require('colors');
const mime = require('mime');
const glob = require('glob-fs')({gitignore:false});
const REGION = 'eu-west-1';
const s3 = new AWS.S3({params: {Bucket: 'static.swruk.org'}, region:REGION});

function isNotDirectory(file){
	return !fs.statSync(file).isDirectory();
}

function getContentType(filename){
	return mime.lookup(filename);
}

function uploadFile(file){
	console.log(`upload ${file}`)
	var stream = fs.createReadStream(file);
	var key = file.replace(process.cwd()+'/static/', '');

	console.log('upload %s', key);

	return new Promise(function(resolve, reject){
		s3.upload({
			Key : key,
			Body : stream,
			ACL : 'public-read',
			CacheControl : 'public, max-age=86400',
			ContentType : getContentType(key)
		}, function(err){
			if(err) return reject(err);

			console.log(colors.yellow('%s uploaded'), key);
			resolve();
		});
	})
}


function getFilesToUpload(){
	let fileGlob = 'static/**/*';
	const files = glob.readdirSync(fileGlob)
	console.log('FILES', files)
	return files
		.map(f => path.resolve(f))
		.filter(isNotDirectory);
}


const filePromises = getFilesToUpload().map(uploadFile);


Promise.all(filePromises)
	.then(function(){
		console.log(colors.green(`${filePromises.length} files uploaded`));
		process.exit(0);
	})
	.catch(function(err){
		console.log(colors.red('ERROR'));
		console.error(colors.red(err.toString()));
		console.error(colors.red(err.stack));
		process.exit(1);
	});
