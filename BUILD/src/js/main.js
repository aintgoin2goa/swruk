'use strict';


const components = [
	require('./menu'),
	require('./footer'),
	require('./contact')
];

function init(){
	if(!window.CTM){
		return;
	}

	let html = document.querySelector('html');
	html.classList.add('js');
	html.classList.add('mustard');
	components.forEach(c => c.init());
}

init();


