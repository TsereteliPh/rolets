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
	const show_more_btn = document.querySelector('.js-show-more');

	if (!show_more_btn) return;

	show_more_btn.addEventListener('click', function (e) {
		e.stopImmediatePropagation();
		const container = document.querySelector('.js-show-more-container');
		this.classList.add('loader');

		const response = fetch(adem_ajax.url, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
			},
			body: new URLSearchParams({
				action: 'load_more',
				query: posts,
				page: current_page,
			}),
		})
			.then(response => response.text())
			.then(data => {
				this.classList.remove('loader');
				container.insertAdjacentHTML('beforeend', data);
				current_page++;
				if (current_page === max_pages) this.remove();
			})
			.catch(error => console.error('Error:', error));
	});
}

document.addEventListener('DOMContentLoaded', function () {
	accordion();

	setHeaderScrollClass();

	setFileName();

	sendForm();

	setTelMask();

	showMorePosts();

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
const orderBtn = document.querySelector('.product__order');

if (orderBtn) {
	const modal = document.querySelector('.modal#order');
	const modalProductName = modal.querySelector('.modal__text>span');
	const formProductName = modal.querySelector('input[name=client_product_name]');
	const formProductId = modal.querySelector('input[name=client_product_id]');
	const formProductColor = modal.querySelector('input[name=client_product_color]');

	orderBtn.addEventListener('click', function(e) {
		const color = document.querySelector('.product__color-select').value;

		modalProductName.textContent = this.dataset.productName;
		formProductName.value = this.dataset.productName;
		formProductId.value = this.dataset.productId;
		formProductColor.value = color;
    })
}
