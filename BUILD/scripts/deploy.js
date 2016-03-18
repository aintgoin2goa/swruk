'use strict';
require('dotenv').load();
var AWS = require('aws-sdk');
var fs = require('fs');
var path = require('path');
var colors = require('colors');
var mime = require('mime');

var REGION = 'eu-west-1';

var s3 = new AWS.S3({params: {Bucket: 'static.swruk.org'}, region:REGION});
var dist = path.resolve(__dirname, '../static/');


var foldersToUpload = [
	dist,
	path.resolve(dist, 'fonts/shenzhenindustrial/'),
	path.resolve(dist, 'img/'),
	path.resolve(dist, 'html/')
];

function getContentType(filename){
	return mime.lookup(filename);
}

function uploadFile(file){
	console.log('createreadystream', file);
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
	var files  = [];
	foldersToUpload.forEach(function(folder){
		fs.readdirSync(folder).forEach(function(file){
			if(file.indexOf('.') > 0){
				files.push(path.resolve(folder, file));
			}
		});
	});

	return files;
}

Promise.all(getFilesToUpload().map(uploadFile))
	.then(function(){
		console.log(colors.green('All files uploaded'));
	})
	.catch(function(err){
		console.error(colors.red(err));
	});







