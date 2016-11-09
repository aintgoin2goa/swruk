'use strict';
const FORM_SELECTOR = '.email-tweet-form';
const EMAIL_FORM_SELECTOR = '.email-mp-form';
const TWEET_FORM_SELECTOR = '.tweet-mp-form';

function onButtonClick(form, e){
	e.preventDefault();
	let action = e.target.getAttribute('data-action');
	setPostCodeFieldName(action, form);
	setFormUrlAndMethod(action, form);
	form.submit();
}

function setPostCodeFieldName(action, form){
	let input = form.querySelector('input[type="text"]');
	input.name = action === 'tweet' ? 'postcode' : 'pc';
}

function setFormUrlAndMethod(action, form){
	if(action === 'tweet'){
		form.action = getFormUrlForTweet();
		form.method = 'post';
	}else{
		form.action = getFormUrlForEmail();
		form.method = 'get';
	}
}

function getFormUrlForEmail(){
	return document.querySelector(EMAIL_FORM_SELECTOR).action;
}

function getFormUrlForTweet(){
	return document.querySelector(TWEET_FORM_SELECTOR).action;
}

export function init(){
	if(!document.getElementById('canvas').classList.contains('write')){
		return;
	}

	let form = document.querySelector(FORM_SELECTOR);
	let buttons = [].slice.apply(form.querySelectorAll('button'));
	buttons.forEach(b => b.addEventListener('click', onButtonClick.bind(null, form)));
}
