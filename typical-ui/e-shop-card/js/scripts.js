(function(id) {
	'use strict';

	const products = document.querySelectorAll('.product');

	if(products) {
		products.forEach(el => {
			let currentProduct = el;
			const imageTriggerItems = currentProduct.querySelectorAll('.image-trigger__item');
			const imageDots = currentProduct.querySelector('.image-dots');

			if(imageTriggerItems.length > 1) {
				imageTriggerItems.forEach((el, index) => {
					el.setAttribute('data-index', index);
					imageDots.innerHTML += `<li class="image-dots__item ${index == 0 ? 'image-dots__item--active' : ''}" data-index="${index}"></li>`;
					el.addEventListener('mouseenter', (e) => {
						currentProduct.querySelectorAll('.image-dots__item').forEach((el => {el.classList.remove('image-dots__item--active')}));
						currentProduct.querySelector(`.image-dots__item[data-index="${e.currentTarget.dataset.index}"]`).classList.add('image-dots__item--active');
					});

					el.addEventListener('mouseleave', (e) => {
						currentProduct.querySelectorAll('.image-dots__item').forEach((el => {el.classList.remove('image-dots__item--active')}));
						currentProduct.querySelector(`.image-dots__item[data-index="0"]`).classList.add('image-dots__item--active');
					});	
				});
			}
		});
	}

}(document));