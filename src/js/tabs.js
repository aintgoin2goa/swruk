'use strict';

function fixFooter(){
	let e = new CustomEvent('footer');
	window.dispatchEvent(e);
}

function hashToId(hash){
	return hash.replace('#', '');
}

function els(selector, parent){
	if(!parent){
		parent = document;
	}
	return [].slice.apply(parent.querySelectorAll(selector));
}

function hidePanel(panel){
	panel.setAttribute('aria-hidden', 'true');
}

function showPanel(panel){
	panel.setAttribute('aria-hidden', 'false');
}

function hideCurrentPanel(){
	let panel = document.querySelector('.tabpanel[aria-hidden="false"]');
	if(panel){
		hidePanel(panel);
	}
}

function deSelectCurrentTab(){
	let el = document.querySelector('a[aria-selected=true]');
	el && setAsUnselected(el);
}

function hideAllPanels(){
	els('.tabpanel').forEach(hidePanel);
}

function setAsSelected(el){
	el.setAttribute('aria-selected', 'true');
}

function setAsUnselected(el){
	el.setAttribute('aria-selected', 'false');
}

function getPanelFor(a){
	let id = hashToId(a.hash);
	return document.getElementById(id);
}

function showTab(id){
	let a = document.getElementById(id + '_tab');
	let panel = document.getElementById(id);
	hideCurrentPanel();
	deSelectCurrentTab();
	setAsSelected(a);
	showPanel(panel);
	history.pushState({}, '', '#'+id)
}

function onTabClick(e){
	e.preventDefault();
	showTab(hashToId(e.target.hash));
}

function openFromUrl(){
	if(location.hash) {
		let id = hashToId(location.hash);
		let el = document.getElementById(id + '_tab');
		if (el) {
			showTab(id);
			return true;
		}
	}else{
		return false;
	}
}

export function init(){
	hideAllPanels();
	els('ul[role="tablist"]').forEach(ul => {
		ul.classList.add('visible');
		els('a', ul).forEach(a => {
			a.addEventListener('click', onTabClick);
			hidePanel(getPanelFor(a));
		});
		openFromUrl() || ul.querySelector('li:first-child a').click();
	});
	window.addEventListener('hashchange', function(){
		openFromUrl();
	})
}
