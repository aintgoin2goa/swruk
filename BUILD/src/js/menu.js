'use strict';
const offCanvasClass = 'off';
const canvasSelector = '#canvas';
const menuButtonSelector = '.menu-button a';
const menuOpenButtonText = 'Menu';
const menuCloseButtonText = 'Close';

function showMenu(canvas, e){
	e.stopPropagation();
	canvas.classList.add(offCanvasClass);
	updateMenuButtonsText(menuCloseButtonText);
}

function hideMenu(canvas){
	canvas.classList.remove(offCanvasClass);
	updateMenuButtonsText(menuOpenButtonText);
}

function toggleMenu(canvas, e){
	canvas.classList.contains(offCanvasClass) ? hideMenu(canvas) : showMenu(canvas, e);
}

function getMenuButtonEls(){
	return Array.from(document.querySelectorAll(menuButtonSelector));
}

function updateMenuButtonsText(newText){
	getMenuButtonEls().forEach(updateMenuButtonText.bind(null, newText));
}

function updateMenuButtonText(newText, button){
	button.querySelector('span').textContent = newText;
}

function addEventToMenuButton(canvas, button){
	button.addEventListener('click', toggleMenu.bind(null, canvas));
}

export function init(){
	let canvas = document.querySelector(canvasSelector);
	getMenuButtonEls().forEach(addEventToMenuButton.bind(null, canvas));
	canvas.addEventListener('click', hideMenu.bind(null, canvas));
}




