'use strict';
const Handlebars = require('handlebars');
const fs = require('fs');
const path = require('path');
const denodeify = require('denodeify');
const readdir = denodeify(fs.readdir);
const writeFile = denodeify(fs.writeFile);
const readFile = denodeify(fs.readFile);
const mkdir = denodeify(fs.mkdir);
const co = require('co');
const colors = require('colors');

const srcDir = path.resolve(__dirname, '../src/html/');
const destDir = path.resolve(__dirname, '../static/html/');
const output = new Map();
const data = {};

co(function* (){
	yield mkdir(destDir);
	let files = yield readdir(srcDir);
	for(let file of files){
		if(file.indexOf('.hbs') === -1){
			continue;
		}

		if(file.indexOf('_') !== 0){
			let fileContents = yield readFile(path.resolve(srcDir, file), {encoding:'utf8'});
			let compiledTemplate = Handlebars.compile(fileContents);
			output.set(file.replace('hbs', 'html'), compiledTemplate(data));
		}else{
			let partialContent = yield readFile(path.resolve(srcDir, file), {encoding:'utf8'});
			Handlebars.registerPartial(file.replace(/^_/, '').replace('.hbs', ''), partialContent)
		}
	}

	for(let o of output){
		yield writeFile(path.resolve(destDir, o[0]), o[1], {encoding:'utf8'});
	}
})
.then(() => {
	console.log(colors.green('html compiled'));
	process.exit(0);
})
.catch(err => {
	console.error(colors.red(err.toString()));
	console.error(colors.red(err.stack));
	process.exit(1);
});





