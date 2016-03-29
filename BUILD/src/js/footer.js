'use strict';
const fixedFooterClass = 'fixed-footer';

function calculateHeightDifference(window, element){
	return window.innerHeight - element.offsetHeight;
}

function fixFooter(canvas){
	canvas.classList.add(fixedFooterClass);
}

function unfixFooter(canvas){
	canvas.classList.remove(fixedFooterClass);
}

function checkCanvasHeight(canvas){
	let diff = calculateHeightDifference(window, canvas);
	if(diff < 0){
		unfixFooter(canvas);
	}else{
		fixFooter(canvas);
	}
}

export function init(){
	let canvas = document.getElementById('canvas');
	let footer = document.querySelector('footer');
	let check = checkCanvasHeight.bind(null, canvas, footer);
	check();
	window.addEventListener('resize', check);
}



