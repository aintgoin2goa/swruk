'use strict';


const components = [
	require('./menu')
];

function init(){
	if(!window.CTM){
		return;
	}

	let html = document.querySelector('html');
	html.classList.add('js');
	html.classList('mustard');
	components.forEach(c => c.init());
}

init();


