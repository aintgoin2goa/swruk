'use strict';
require('dotenv').load();
var AWS = require('aws-sdk');
var fs = require('fs');
var path = require('path');
var colors = require('colors');
var mime = require('mime');
var glob = require('glob-fs')({gitignore:true});

var REGION = 'eu-west-1';

var s3 = new AWS.S3({params: {Bucket: 'static.swruk.org'}, region:REGION});
var dist = path.resolve(__dirname, '../static/');

function isNotDirectory(file){
	return !fs.statSync(file).isDirectory();
}

function getContentType(filename){
	return mime.lookup(filename);
}

function uploadFile(file){
	var stream = fs.createReadStream(file);
	var key = file.replace(process.cwd()+'/static/', '');

	console.log('upload %s', key);

	return new Promise(function(resolve, reject){
		s3.upload({
			Key : key,
			Body : stream,
			ACL : 'public-read',
			CacheControl : 'public, max-age=3600',
			ContentType : getContentType(key)
		}, function(err){
			if(err) return reject(err);

			console.log(colors.yellow('%s uploaded'), key);
			resolve();
		});
	})
}


function getFilesToUpload(){
	let files = 'static/**/**';
	return glob.readdirSync(files)
		.map(f => path.resolve(f))
		.filter(isNotDirectory);
}

Promise.all(getFilesToUpload().map(uploadFile))
	.then(function(){
		console.log(colors.green('All files uploaded'));
		process.exit(0);
	})
	.catch(function(err){
		console.log(colors.red('ERROR'));
		console.error(colors.red(err.toString()));
		console.error(colors.red(err.stack));
		process.exit(1);
	});







