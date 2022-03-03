(function(id) {
	'use strict';

	const products = document.querySelectorAll('.product');

	if(products) {
		products.forEach(el => {
			const imageTriggerItems = el.querySelectorAll('.image-trigger__item');
			const imageDots = el.querySelector('.image-dots');

			if(imageTriggerItems.length > 1) {
				imageTriggerItems.forEach((el, index) => {
					el.setAttribute('data-index', index);
					imageDots.innerHTML += '<li class="image-dots__item" data-index="${index}"></li>';
				});
			}
		});
	}

}(document));