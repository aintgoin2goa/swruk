'use strict';
const emailRegex = /[A-Z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z]{2,}/i;
const errorClass = 'error';

function disableHTML5Validation(){
	Array.from(document.querySelectorAll('form')).forEach(form => {
		form.setAttribute('novalidate', '');
	});
}

function validateAsRequired(element){
	return element.value.trim() !== "";
}

function validateAsEmail(element){
	return emailRegex.test(element.value);
}

function checkValidity(element){
	let validity = validateAsRequired(element);
	if(!validity){
		return {element: element, valid:false, failure:'required'}
	}

	if(element.type === 'email'){
		validity = validateAsEmail(element);
	}

	return validity ? {element:element, valid:true} : {element: element, valid:false, failure:'email'};
}

function validateAll(elements){
	return elements.map(checkValidity);
}

function isInvalid(element){
	return element.parentNode.classList.contains(errorClass)
}

function makeInvalid(element, error){
	let container = element.parentNode;
	container.classList.add(errorClass);
	container.setAttribute('data-error', error);
}

function makeValid(element){
	let container = element.parentNode;
	container.classList.remove(errorClass);
	container.removeAttribute('data-error');
}

function reduceResults(results){
	return !results.some(r => !r.valid);
}


function validateIfNecessary(inputs, event){
	let el = event.target;
	if(event.type === 'click' && event.target.type === 'submit'){
		event.preventDefault();
		let results = validateAll(inputs);
		if(reduceResults(results) === true){
			results[0].element.form.submit();
		}
		return results;
	}


	let nodeName = el.nodeName.toLowerCase();

	if(event.type === 'keyup' && isInvalid(el)){
		return [checkValidity(el)]
	}

	if(event.type === 'change' && (nodeName === 'input' || nodeName === 'textarea')){
		return [checkValidity(el)];
	}

	return [];
}

function handleValidationResults(results) {
	for(let result of results){
		if(result.valid){
			makeValid(result.element);
		}else{
			makeInvalid(result.element, result.failure);
		}
	}
}

function eventHandler(inputs, event){
	handleValidationResults(validateIfNecessary(inputs, event));
}

function addEvents(form){
	let inputs = Array.from(form.querySelectorAll('input, textarea'));
	let handler = eventHandler.bind(null, inputs);
	form.addEventListener('keyup', handler);
	form.addEventListener('change', handler);
	form.addEventListener('click', handler);
}

export function init(){
	let form = document.querySelector('.contact-form');
	if(form){
		disableHTML5Validation();
		addEvents(form);
	}
}
