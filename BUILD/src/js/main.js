'use strict';
require('babel-polyfill');

let initRun = false;


const components = [
	require('./menu'),
	require('./footer'),
	require('./contact'),
	require('./write')
];

function init(){
	if(initRun){
		return;
	}

	initRun = true;
	let html = document.querySelector('html');
	html.classList.add('js');
	html.classList.add('mustard');
	components.forEach(c => c.init());
}

window.SITE_INIT = init;
window.polyfillsLoaded && init();


