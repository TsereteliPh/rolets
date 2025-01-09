"use strict";

function get_siblings(elem) {
	// for collecting siblings
	let siblings = [];
	// if no parent, return no sibling
	if (!elem.parentNode) {
		return siblings;
	}
	// first child of the parent node
	let sibling = elem.parentNode.firstChild;
	// collecting siblings
	while (sibling) {
		if (sibling.nodeType === 1 && sibling !== elem) {
			siblings.push(sibling);
		}
		sibling = sibling.nextSibling;
	}
	return siblings;
}

function slideDown(elem) {
	elem.style.maxHeight = `${elem.scrollHeight}px`;
}

function slideToggle(elem) {
	if (elem.offsetHeight === 0) {
		elem.style.maxHeight = `${elem.scrollHeight}px`;
	} else {
		elem.style.maxHeight = 0;
	}
}

function accordion() {
	const accordionHolders = document.querySelectorAll('.js-accordion');

	accordionHolders.forEach(accordion => {
		const accordionBtns = accordion.querySelectorAll('button');

		const accordionBtnsClose = () => {
			for (let btn of accordionBtns) {
				btn.classList.remove('active');
				btn.nextElementSibling.style.maxHeight = 0;
			}
		}

		accordionBtns.forEach(btn => {
			btn.addEventListener('click', function() {
				if (this.classList.contains('active')) {
					accordionBtnsClose();
				} else {
					accordionBtnsClose();
					this.classList.add('active');
					slideToggle(this.nextElementSibling);
				}
			})
		});
	});
}

function setHeaderScrollClass() {
	const header = document.querySelector('.header');

	window.addEventListener('scroll', function () {
		if (window.scrollY >= header.offsetHeight) {
			header.classList.add('scroll');
		} else {
			header.classList.remove('scroll');
		}
	});
}

function setTelMask() {
	[].forEach.call(document.querySelectorAll('[type="tel"]'), function (input) {
		let keyCode;

		function mask(event) {
			event.keyCode && (keyCode = event.keyCode);
			let pos = this.selectionStart;
			if (pos < 3) event.preventDefault();
			let matrix = '+7 (___) ___-__-__',
				i = 0,
				def = matrix.replace(/\D/g, ''),
				val = this.value.replace(/\D/g, ''),
				new_value = matrix.replace(/[_\d]/g, function (a) {
					return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
				});
			i = new_value.indexOf('_');
			if (i != -1) {
				i < 5 && (i = 3);
				new_value = new_value.slice(0, i);
			}
			let reg = matrix
				.substr(0, this.value.length)
				.replace(/_+/g, function (a) {
					return '\\d{1,' + a.length + '}';
				})
				.replace(/[+()]/g, '\\$&');
			reg = new RegExp('^' + reg + '$');
			if (
				!reg.test(this.value) ||
				this.value.length < 5 ||
				(keyCode > 47 && keyCode < 58)
			)
				this.value = new_value;
			if (event.type == 'blur' && this.value.length < 5) this.value = '';
		}

		input.addEventListener('input', mask, false);
		input.addEventListener('focus', mask, false);
		input.addEventListener('blur', mask, false);
		input.addEventListener('keydown', mask, false);
	});
}

function changeInputNumber(dispatch = false) {
	const numberHolders = document.querySelectorAll('.number');

    if (!numberHolders) return;

	numberHolders.forEach(numberHolder => {
		numberHolder.addEventListener('click', function(evt) {
			if (evt.target.classList.contains('number__btn')) {
				let input = this.querySelector('.number__input');
				let val = parseInt(input.value || 0);
				let min = parseInt(input.getAttribute('min'));
				let max = parseInt(input.getAttribute('max'));
				let step = parseInt(input.getAttribute('step'));

				if (evt.target.classList.contains('number__btn--increment')) {
					if (max && (max <= val)) {
						input.value = max;
					} else {
						input.value = val + step;
					}
				} else {
					if ((min || min == 0) && (min >= val - step)) {
						input.value = min;
					} else if (val > 1) {
						input.value = val - step;
					}
				}

				const changeNumberInput = new Event('change', {bubbles: true, cancelable: true});
				input.dispatchEvent(changeNumberInput);
			}
		});
	});
}

function sendForm() {
	document.querySelectorAll('form[name]').forEach(function (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			const form = this;
			form.classList.add('loader');
			let formData = new FormData(form);
			const formName = form.name;
			const fileInput = form.querySelector('input[type=file]');

			formData.append('action', 'send_mail');

			if (formName) {
				formData.append('form_name', formName);
			} else {
				return;
			}

			if (fileInput) {
				Array.from(fileInput.files).forEach((file, key) => {
					formData.append(key.toString(), file);
				});
			}

			if (form.name === 'Калькулятор') {
				formData = setCalculatorFormData(formData);
			}

			const response = fetch(adem_ajax.url, {
				method: 'POST',
				body: formData,
			})
				.then(response => {
					form.classList.remove('loader');
					Fancybox.close(true);
					form.reset();
					setTimeout(function () {
						Fancybox.show([
							{
								src: response.ok ? '#success' : '#failure',
								type: 'inline',
							},
						]);
					}, 100);
				})
				.catch(error => console.error('Error:', error));
		});
	});
}

function setCalculatorFormData(formData) {
	let calcParams = '';
	const filteredFormData = new FormData();

	for (let [key, value] of formData.entries()) {
		if (key.startsWith('client_calc')) {
			let elem = document.querySelector(`[data-calc-label="${key}"]`);
			calcParams += elem.textContent.trim() + ': ' + value.trim() + '<br>';
		} else {
			filteredFormData.set(key, value);
		}
	}

	filteredFormData.set('client_calc_params', calcParams);

	return filteredFormData;
}

function setFileName() {
	const fileInputs = document.querySelectorAll('input[type=file]');
	if (fileInputs) {
		fileInputs.forEach(function (input) {
			input.addEventListener('change', function (e) {
				e.target.nextElementSibling.textContent = e.target.files[0].name;
			});
		});
	}
}

function tabs() {
	const tabsLists = document.querySelectorAll('.js-tabs');
	if (tabsLists) {
		tabsLists.forEach(function (tabsList) {
			bindUIFunctions(tabsList);
		});
	}

	function bindUIFunctions(tabsList) {
		tabsList.addEventListener('click', function (e) {
			const tabItem = e.target.closest('li');
			if (tabItem.classList.contains('active')) {
				toggleMobileMenu(tabItem);
			}
			if (!tabItem.classList.contains('active') && e.target !== tabsList) {
				changeTab(tabItem);
			}
		});
	}

	function changeTab(tabItem) {
		const tabContainer = document.querySelector(
			'#' + tabItem.getAttribute('data-tab')
		);

		tabItem.classList.add('active');
		get_siblings(tabItem).forEach(function (tab) {
			tab.classList.remove('active');
		});

		tabContainer.classList.add('active');
		get_siblings(tabContainer).forEach(function (tab_container) {
			tab_container.classList.remove('active');
		});

		tabItem.parentNode.classList.remove('open');
	}

	function toggleMobileMenu(tabItem) {
		tabItem.parentNode.classList.toggle('open');
	}
}

//Ajax

function showMorePosts() {
	const show_more_btns = document.querySelectorAll('.js-show-more');

	if (!show_more_btns) return;

	show_more_btns.forEach(button => {
		button.addEventListener('click', function (e) {
			e.stopImmediatePropagation();
			let container = this.previousElementSibling;
			this.classList.add('loader');
			let slug = this.dataset.slug;

			let response = fetch(adem_ajax.url, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
				},
				body: new URLSearchParams({
					action: 'load_more',
					query: window[`${slug}_posts`],
					page: window[`${slug}_current_page`],
				}),
			})
				.then(response => response.text())
				.then(data => {
					this.classList.remove('loader');
					container.insertAdjacentHTML('beforeend', data);
					window[`${slug}_current_page`]++;
					if (window[`${slug}_current_page`] === window[`${slug}_max_pages`]) this.classList.add('hidden');
				})
				.catch(error => console.error('Error:', error));
		});
	});
}

//Ajax catalog filters

function showCatalogFilters() {
	const form = document.querySelector('.catalog__filters-form');

	if (!form) return;

	form.addEventListener('submit', function (e) {
		e.preventDefault();

		let formData = new FormData(form);
		formData.append('action', 'catalog_filters');
		let container = document.querySelector('.js-catalog-container');
		for (const element of container.children) {
			element.classList.add('loader');
		}
		let showMoreBtn = document.querySelector('.js-show-more');
		showMoreBtn.disabled = true;

		let response = fetch(adem_ajax.url, {
			method: 'POST',
			body: formData,
		})
			.then(response => response.json())
			.then(data => {
				if (data.status) {
					window['catalog_posts'] = JSON.stringify(data.query);
					window['catalog_current_page'] = data.paged;
					window['catalog_max_pages'] = data.max_pages;

					let response = fetch(adem_ajax.url, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
						},
						body: new URLSearchParams({
							action: 'load_more',
							query: window[`catalog_posts`],
							page: window[`catalog_current_page`],
						}),
					})
						.then(response => response.text())
						.then(data => {
							container.innerHTML = data;
							window[`catalog_current_page`]++;
							if (window[`catalog_current_page`] === window[`catalog_max_pages`]) {
								showMoreBtn.classList.add('hidden');
							} else {
								showMoreBtn.classList.remove('hidden');
								showMoreBtn.disabled = false;
							}
						})
						.catch(error => {
							console.error('Error:', error);
							Fancybox.show([
								{
									src: '#failure',
									type: 'inline',
								},
							]);
						});
				} else {
					container.innerHTML = data.message;
					showMoreBtn.classList.add('hidden');
				}
			})
			.catch(error => {
				console.error('Error:', error);
				Fancybox.show([
					{
						src: '#failure',
						type: 'inline',
					},
				]);
			});
	});
}

document.addEventListener('DOMContentLoaded', function () {
	accordion();

	setHeaderScrollClass();

	setFileName();

	sendForm();

	setTelMask();

	changeInputNumber();

	showMorePosts();

	showCatalogFilters();

	tabs();
});

//Fancybox

try {
	Fancybox.bind('[data-fancybox]', {
		animated: false,
	});
} catch (error) {
	console.error('Error: ' + error);
}

//Swiper

//Слайдер blocks/advantages

const advantagesSlider = document.querySelector('.advantages__container');

if (advantagesSlider) {
	let advantagesSwiper = new Swiper(advantagesSlider, {
		slidesPerView: 'auto',
		spaceBetween: 60,
		centerInsufficientSlides: true,
		pagination: {
			el: '.advantages__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true
		},
		breakpoints: {
			1440: {
				slidesPerView: 5,
				spaceBetween: 20
			},
			1280: {
				slidesPerView: 4,
				spaceBetween: 20
			},
			992: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			769: {
				slidesPerView: 2,
				spaceBetween: 20
			}
		},
		on: {
			afterInit: function() {
				if (this.slides.length <= this.params.slidesPerView) {
					this.pagination.el.style.display = 'none';
				}
			}
		}
	});
}

//Слайдер blocks/rest

const docsSlider = document.querySelector('.docs__slider');

if (docsSlider) {
	let docsSwiper = new Swiper(docsSlider, {
		slidesPerView: 'auto',
		spaceBetween: 10,
		centerInsufficientSlides: true,
		pagination: {
			el: '.docs__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true
		},
		navigation: {
			nextEl: '.docs__next',
			prevEl: '.docs__prev',
		},
		breakpoints: {
			1440: {
				slidesPerView: 4,
				spaceBetween: 20
			},
			1280: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			992: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			769: {
				slidesPerView: 2,
				spaceBetween: 20
			}
		},
		on: {
			afterInit: function() {
				if (this.slides.length <= this.params.slidesPerView) {
					this.pagination.el.style.display = 'none';
				}
			}
		}
	});
}

//Слайдер blocks/partners

const partnersSlider = document.querySelector('.partners__slider');

if (partnersSlider) {
	let partnersSwiper = new Swiper(partnersSlider, {
		slidesPerView: 2,
		spaceBetween: 30,
		centerInsufficientSlides: true,
		pagination: {
			el: '.partners__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true
		},
		navigation: {
			nextEl: '.partners__next',
			prevEl: '.partners__prev',
		},
		breakpoints: {
			1440: {
				slidesPerView: 6,
				spaceBetween: 150
			},
			1280: {
				slidesPerView: 4,
				spaceBetween: 60
			},
			769: {
				slidesPerView: 3,
				spaceBetween: 40
			}
		},
		on: {
			afterInit: function() {
				if (this.slides.length <= this.params.slidesPerView) {
					this.pagination.el.style.display = 'none';
				}
			}
		}
	});
}

//Слайдер blocks/articles-slider

const articlesSlider = document.querySelector('.articles-slider__slider');

if (articlesSlider && window.innerWidth < 1440) {
	let articlesSwiper = new Swiper(articlesSlider, {
		slidesPerView: 'auto',
		spaceBetween: 20,
		pagination: {
			el: '.articles-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true
		},
		breakpoints: {
			1280: {
				slidesPerView: 3,
			},
			769: {
				slidesPerView: 2,
			},
		},
		on: {
			afterInit: function() {
				if (this.slides.length <= this.params.slidesPerView) {
					this.pagination.el.style.display = 'none';
				}
			}
		}
	});
}

//Слайдер blocks/products-slider

const productsSliders = document.querySelectorAll('.products-slider');

if (productsSliders) {
	productsSliders.forEach(slider => {
		let swiper = slider.querySelector('.products-slider__slider');
		let prevBtn = slider.querySelector('.products-slider__prev');
		let nextBtn = slider.querySelector('.products-slider__next');
		let pagination = slider.querySelector('.products-slider__pagination');

		let productsSwiper = new Swiper(swiper, {
			slidesPerView: 'auto',
			spaceBetween: 20,
			centerInsufficientSlides: true,
			pagination: {
				el: pagination,
				bulletClass: 'pagination__bullet',
				bulletActiveClass: 'active',
				clickable: true
			},
			navigation: {
				nextEl: nextBtn,
				prevEl: prevBtn,
			},
			breakpoints: {
				1440: {
					slidesPerView: 4,
				},
				1280: {
					slidesPerView: 3,
				},
				992: {
					slidesPerView: 3,
				},
				769: {
					slidesPerView: 2,
				}
			},
			on: {
				afterInit: function() {
					if (this.slides.length <= this.params.slidesPerView) {
						this.pagination.el.style.display = 'none';
						this.navigation.nextEl.style.display = 'none';
						this.navigation.prevEl.style.display = 'none';
					}
				}
			}
		});
	});
}

//Слайдер blocks/basic-slider

const basicSliders = document.querySelectorAll('.basic-slider');

if (basicSliders) {
	basicSliders.forEach(slider => {
		let swiper = slider.querySelector('.basic-slider__slider');
		let prevBtn = slider.querySelector('.basic-slider__prev');
		let nextBtn = slider.querySelector('.basic-slider__next');
		let pagination = slider.querySelector('.basic-slider__pagination');

		let basicSwiper = new Swiper(swiper, {
			slidesPerView: 'auto',
			spaceBetween: 20,
			centerInsufficientSlides: true,
			pagination: {
				el: pagination,
				bulletClass: 'pagination__bullet',
				bulletActiveClass: 'active',
				clickable: true
			},
			navigation: {
				nextEl: nextBtn,
				prevEl: prevBtn,
			},
			breakpoints: {
				1280: {
					slidesPerView: 4,
					autoHeight: true,
				},
				992: {
					slidesPerView: 3,
					autoHeight: true,
				},
				769: {
					slidesPerView: 2,
					autoHeight: true,
				}
			},
			on: {
				afterInit: function() {
					if (this.slides.length <= this.params.slidesPerView) {
						this.pagination.el.style.display = 'none';
						this.navigation.nextEl.style.display = 'none';
						this.navigation.prevEl.style.display = 'none';
					}
				}
			}
		});
	});
}

//Слайдер blocks/production

const productionSliders = document.querySelectorAll('.production__gallery');

if (productionSliders) {
	productionSliders.forEach(slider => {
		let productionSwiper = new Swiper(slider, {
			slidesPerView: 1,
			resistanceRatio: 0,
			pagination: {
				el: '.production__gallery-pagination',
				type: 'fraction'
			},
			navigation: {
				nextEl: '.production__gallery-next',
				prevEl: '.production__gallery-prev',
			},
			on: {
				afterInit: function() {
					if (this.slides.length <= this.params.slidesPerView) {
						slider.querySelector('.production__gallery-controls').style.display = 'none';
					}
				}
			}
		});
	});
}

//Слайдер blocks/extra-options

const extraOptionsSliders = document.querySelectorAll('.extra-options__gallery');

if (extraOptionsSliders) {
	extraOptionsSliders.forEach(slider => {
		let extraOptionsSwiper = new Swiper(slider, {
			slidesPerView: 1,
			resistanceRatio: 0,
			pagination: {
				el: '.extra-options__gallery-pagination',
				type: 'fraction'
			},
			navigation: {
				nextEl: '.extra-options__gallery-next',
				prevEl: '.extra-options__gallery-prev',
			},
			on: {
				afterInit: function() {
					if (this.slides.length <= this.params.slidesPerView) {
						slider.querySelector('.extra-options__gallery-controls').style.display = 'none';
					}
				}
			}
		});
	});
}

//Слайдер blocks/new-products

const newProductsSlider = document.querySelector('.new-products__slider');

if (newProductsSlider) {
	let newProductsSwiper = new Swiper(newProductsSlider, {
		slidesPerView: 'auto',
		spaceBetween: 10,
		centerInsufficientSlides: true,
		navigation: {
			nextEl: '.new-products__next',
			prevEl: '.new-products__prev',
		},
		breakpoints: {
			992: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			769: {
				slidesPerView: 2,
				spaceBetween: 20
			}
		}
	});
}

//Слайдер blocks/extra-options

const galleryTabsSliders = document.querySelectorAll('.gallery-tabs__gallery');

if (galleryTabsSliders) {
	galleryTabsSliders.forEach(slider => {
		let galleryTabsSwiper = new Swiper(slider, {
			slidesPerView: 1,
			resistanceRatio: 0,
			pagination: {
				el: '.gallery-tabs__gallery-pagination',
				type: 'fraction'
			},
			navigation: {
				nextEl: '.gallery-tabs__gallery-next',
				prevEl: '.gallery-tabs__gallery-prev',
			},
		});
	});
}

// Слайдер product__gallery

const productGallery = document.querySelector('.product__gallery');

if (productGallery) {
	let productThumb = document.querySelector('.product__gallery-thumb-swiper');
	let productBig = document.querySelector('.product__gallery-big');

	let thumbProductSlider = new Swiper(productThumb, {
		direction: 'vertical',
		spaceBetween: 10,
		slidesPerView: 4,
		watchSlidesProgress: true,
		navigation: {
			nextEl: '.product__gallery-thumb-next',
			prevEl: '.product__gallery-thumb-prev'
		}
	});

	let bigProductSlider = new Swiper(productBig, {
		slidesPerView: 'auto',
		spaceBetween: 30,
		navigation: {
			nextEl: '.product__gallery-big-next',
			prevEl: '.product__gallery-big-prev'
		},
		thumbs: {
			swiper: thumbProductSlider,
		}
	});
}

//Слайдер blocks/rest

const brandsSlider = document.querySelector('.brands-slider__slider');

if (brandsSlider) {
	let brandsSwiper = new Swiper(brandsSlider, {
		slidesPerView: 'auto',
		spaceBetween: 20,
		centerInsufficientSlides: true,
		pagination: {
			el: '.brands-slider__pagination',
			bulletClass: 'pagination__bullet',
			bulletActiveClass: 'active',
			clickable: true
		},
		navigation: {
			nextEl: '.brands-slider__next',
			prevEl: '.brands-slider__prev',
		},
		breakpoints: {
			1440: {
				slidesPerView: 4,
				spaceBetween: 35
			},
			992: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			769: {
				slidesPerView: 2,
				spaceBetween: 20
			}
		},
	});
}

// Функционал шапки сайта

document.addEventListener('DOMContentLoaded', function(e) {
	const header = document.querySelector('.header');

	if (header) {
		const headerBurger = header.querySelector('.header__burger');
		const headerDrop = header.querySelector('.header__drop');

		const dropOpener = () => {
			header.classList.add('active');
			headerBurger.classList.add('active');
			headerDrop.style.maxHeight = headerDrop.scrollHeight + 'px';
		}

		const dropCloser = () => {
			header.classList.remove('active');
			headerBurger.classList.remove('active');
			headerDrop.style.maxHeight = 0;
		}

		headerBurger.addEventListener('click', function() {
			if (this.classList.contains('active')) {
				dropCloser();
			} else {
				dropOpener();
			}
		})
	}
})

// Заявка на товар
const orderBtns = document.querySelectorAll('.js-order');

if (orderBtns) {
	const modal = document.querySelector('.modal#order');
	const modalProductName = modal.querySelector('.modal__text>span');
	const productColor = document.querySelector('.product__color-select');
	const formProductName = modal.querySelector('input[name=client_product_name]');
	const formProductId = modal.querySelector('input[name=client_product_id]');
	const formProductColor = modal.querySelector('input[name=client_product_color]');

	orderBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			modalProductName.textContent = this.dataset.productName;
			formProductName.value = this.dataset.productName;
			formProductId.value = this.dataset.productId;

			if (productColor && formProductColor) {
				formProductColor.value = productColor.value;
			}
		})
	});
}

// Заявка на услугу
const serviceBtns = document.querySelectorAll('.js-service-btn');

if (serviceBtns) {
	const modal = document.querySelector('.modal#service');
	const modalServiceName = modal.querySelector('.modal__title>span');
	const formServiceName = modal.querySelector('input[name=client_service]');

	serviceBtns.forEach(btn => {
		btn.addEventListener('click', function() {

			modalServiceName.textContent = this.dataset.serviceTitle;
			formServiceName.value = this.dataset.serviceTitle;
		})
	});
}
