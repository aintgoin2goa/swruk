'use strict';
const offCanvasClass = 'off';
const canvasSelector = '#canvas';
const menuButtonSelector = '.menu-button a';

function showMenu(canvas, e){
	console.log('showMenu');
	e.stopPropagation();
	canvas.classList.add(offCanvasClass);
}

function hideMenu(canvas){
	console.log('hideMenu');
	canvas.classList.remove(offCanvasClass);
}

function toggleMenu(canvas, e){
	canvas.classList.contains(offCanvasClass) ? hideMenu(canvas) : showMenu(canvas, e);
}

export function init(){
	let canvas = document.querySelector(canvasSelector);
	document.querySelector(menuButtonSelector).addEventListener('click', toggleMenu.bind(null, canvas));
	canvas.addEventListener('click', hideMenu.bind(null, canvas));
}




