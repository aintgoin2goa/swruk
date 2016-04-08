'use strict';
const BG_LOADED_CLASS = 'bg-image-loaded';
const BG_IMAGE = 'http://static.swruk.org/img/hungary-border.jpg';

function setAsLoaded(){
	document.body.classList.add(BG_LOADED_CLASS);
}

export function init(){
	let img = new Image();
	img.onload = setAsLoaded;
	img.src = BG_IMAGE;
}


