'use strict';
const fs = require('fs');
const path = require('path');

const STATIC_VERSION_SCSS_FILE = path.resolve(__dirname, '../src/scss/static_asset_version.scss');
const STATIC_VERSION_PHP_FILE = path.resolve(__dirname, '../wordpress/wp-content/themes/swruk/static_asset_version.php');

const PHP_VERSION_REGEX = /define\('STATIC_ASSET_VERSION', '(\d+)'\)/;
const SASS_VERSION_REGEX = /\$static-asset-version:\w*(\d+);/;

function getVersionFromPHP(){
	let txt = fs.readFileSync(STATIC_VERSION_PHP_FILE, {encoding:'utf8'});
	return parseInt(PHP_VERSION_REGEX.exec(txt)[1], 10);
}

function setPhpVersion(version){
	let txt = `<?php
 		define('STATIC_ASSET_VERSION', '${version}');
	?>`;
	fs.writeFileSync(STATIC_VERSION_PHP_FILE, txt, {encoding:'utf8'});
}

function getVersionFromSass(){
	let txt = fs.readFileSync(STATIC_VERSION_SCSS_FILE, {encoding:'utf8'})
	return parseInt(SASS_VERSION_REGEX.exec(txt)[1], 10);
}

function setSassVersion(version){
	let txt = `$static-asset-version:${version};`;
	fs.writeFileSync(STATIC_VERSION_SCSS_FILE, txt, {encoding:'utf8'});
}

function getCurrentVersion(){
	let scssVersion = getVersionFromSass();
	let phpVersion = getVersionFromPHP();
	if(phpVersion > scssVersion){
		console.log('Versions do not match, using version from php file');
		return phpVersion
	}
	if(scssVersion > phpVersion){
		console.log('Versions do not match, using version from scss file');
		return scssVersion;
	}

	return phpVersion;
}

function setCurrentVersion(version){
	console.log('Current static file version: ' + version)
	setPhpVersion(version);
	setSassVersion(version);
}

setCurrentVersion(getCurrentVersion());
