'use strict';
const MAX_WIDTH = 700;

export function init(){
	let frame = document.getElementById('form_frame');
	let container = document.querySelector('.form-container');
	if(!frame){
		return;
	}

	function resize(){
		let allowedwidth = container.offsetWidth;
		if(allowedwidth < MAX_WIDTH) {
			frame.width = allowedwidth - 10;
		}else{
			frame.width = MAX_WIDTH;
		}
	}

	window.addEventListener('resize', resize);
	resize();
}
