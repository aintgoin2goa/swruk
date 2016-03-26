'use strict';
const offCanvasClass = 'off';
const canvasSelector = '#canvas';
const menuButtonSelector = '.menu-button';
const menuOpenButtonText = 'Menu';
const menuCloseButtonText = 'Close';
const menuOpenClass = 'open';

function showMenu(canvas, menu, e){
	e.stopPropagation();
	canvas.classList.add(offCanvasClass);
	menu.classList.add(menuOpenClass);
	updateMenuButtonsText(menuCloseButtonText, 'open');
}

function hideMenu(canvas, menu){
	canvas.classList.remove(offCanvasClass);
	menu.classList.remove(menuOpenClass);
	updateMenuButtonsText(menuOpenButtonText, 'closed');
}

function toggleMenu(canvas, menu, e){
	e.preventDefault();
	canvas.classList.contains(offCanvasClass) ? hideMenu(canvas, menu) : showMenu(canvas, menu, e);
}

function getMenuButtonEls(){
	return Array.from(document.querySelectorAll(menuButtonSelector));
}

function updateMenuButtonsText(newText, state){
	getMenuButtonEls().forEach(updateMenuButtonTextAndState.bind(null, newText, state));
}

function updateMenuButtonTextAndState(newText, state, button){
	button.querySelector('span').textContent = newText;
	button.setAttribute('data-state', state);
}

function addEventToMenuButton(canvas, menu, button){
	button.addEventListener('click', toggleMenu.bind(null, canvas, menu));
}

export function init(){
	let canvas = document.querySelector(canvasSelector);
	let menu = document.querySelector('nav.menu');
	getMenuButtonEls().forEach(addEventToMenuButton.bind(null, canvas, menu));
	canvas.addEventListener('click', hideMenu.bind(null, canvas, menu));
}




