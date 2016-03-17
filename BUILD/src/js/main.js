'use strict';

document.querySelector('html').classList.add('js');

const components = [
	require('./menu')
];

function init(){
	components.forEach(c => c.init());
}

init();


