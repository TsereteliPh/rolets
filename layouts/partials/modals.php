<?php
	$privacy_url = get_privacy_policy_url();

	if ( is_archive() ) {
		$page_title = get_the_archive_title();
	} else {
		$page_title = get_the_title();
	}
?>

<div class="modal modal--success" id="success">
	<div class="modal__info">
		<div class="modal__title">Спасибо!</div>

		<div class="modal__text">Мы получили вашу заявку и успешно её обработали! Наши специалисты свяжутся с вами в ближайшее время.</div>
	</div>
</div>

<div class="modal modal--failure" id="failure">
	<div class="modal__info">
		<div class="modal__title">Ошибка!</div>

		<div class="modal__text">Пожалуйста, попробуйте снова. Если проблема повторится, обратитесь в поддержку.</div>
	</div>
</div>

<div class="modal modal--callback" id="callback">
	<div class="modal__info">
		<div class="modal__title">Обратный звонок</div>

		<div class="modal__text">Заполните форму и наши специалисты свяжутся с вами в ближайшее время.</div>
	</div>

	<form method="POST" class="modal__form" name="Звонок">
		<input type="tel" class="input input--dark modal__input" name="client_tel" placeholder="+ 7 ( ___ ) - ___ - __ -__" required>

		<label class="checkbox modal__policy">
			<input type="checkbox" name="policy" class="checkbox__input" required checked>
			<span class="checkbox__switcher"></span>
			<span class="checkbox__text">Даю согласие на обработку моих персональных данных в соответствии с <a href="<?php echo get_privacy_policy_url(); ?>">Политикой конфиденциальности</a></span>
		</label>

		<button class="btn modal__submit" type="submit">Отправить запрос</button>

		<input type="text" class="hidden" name="page_request" value="<?php echo $page_title; ?>">

		<?php wp_nonce_field( 'Звонок', 'modal-callback-nonce' ); ?>
	</form>
</div>

<div class="modal modal--measure" id="measure">
	<div class="modal__info">
		<div class="modal__title">Заказать замер</div>

		<div class="modal__text">Оперативно приедем, замерим и рассчитаем</div>
	</div>

	<form method="POST" class="modal__form" name="Замер">
		<input type="text" class="input input--dark modal__input" name="client_name" placeholder="ФИО" required>

		<input type="tel" class="input input--dark modal__input" name="client_tel" placeholder="+ 7 ( ___ ) - ___ - __ -__" required>

		<div class="modal__calculations">
			Есть готовые расчеты?
			<span>Вы можете загрузить файл с замерами (форматы Jpeg, PNG, PDF, не более 5 Мб.)</span>
		</div>

		<div class="file-box modal__file">
			<input class="file-box__input" type="file" id="file-input" name="client_file" accept=".jpg, .png, .pdf" size="5242880">

			<label class="file-box__label" for="file-input">
				Выбрать файл
				<svg width="12" height="13"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-upload"></use></svg>
			</label>
		</div>

		<label class="checkbox modal__policy">
			<input type="checkbox" name="policy" class="checkbox__input" required checked>
			<span class="checkbox__switcher"></span>
			<span class="checkbox__text">Даю согласие на обработку моих персональных данных в соответствии с <a href="<?php echo get_privacy_policy_url(); ?>">Политикой конфиденциальности</a></span>
		</label>

		<button class="btn modal__submit" type="submit">Вызвать замерщика</button>

		<input type="text" class="hidden" name="page_request" value="<?php echo $page_title; ?>">

		<?php wp_nonce_field( 'Замер', 'modal-measure-nonce' ); ?>
	</form>
</div>

<div class="modal modal--question" id="question">
	<div class="modal__info">
		<div class="modal__title">Задать вопрос</div>

		<div class="modal__text">Остались вопросы? Задайте их прямо сейчас! Просто заполните форму ниже, и мы свяжемся с вами в ближайшее время.</div>
	</div>

	<form method="POST" class="modal__form" name="Вопрос">
		<input type="text" class="input input--dark modal__input" name="client_name" placeholder="ФИО" required>

		<input type="tel" class="input input--dark modal__input" name="client_tel" placeholder="+ 7 ( ___ ) - ___ - __ -__" required>

		<textarea class="input input--dark modal__textarea" name="client_message" placeholder="Ваш вопрос" required></textarea>

		<label class="checkbox modal__policy">
			<input type="checkbox" name="policy" class="checkbox__input" required checked>
			<span class="checkbox__switcher"></span>
			<span class="checkbox__text">Даю согласие на обработку моих персональных данных в соответствии с <a href="<?php echo get_privacy_policy_url(); ?>">Политикой конфиденциальности</a></span>
		</label>

		<button class="btn modal__submit" type="submit">Отправить</button>

		<input type="text" class="hidden" name="page_request" value="<?php echo $page_title; ?>">

		<?php wp_nonce_field( 'Вопрос', 'modal-question-nonce' ); ?>
	</form>
</div>

<?php if ( is_singular( 'products' ) ) : ?>
	<div class="modal modal--order" id="order">
		<div class="modal__info">
			<div class="modal__title">Заявка на товар</div>

			<div class="modal__text">Оставьте заявку на товар &quot;<span></span>&quot;, и мы свяжемся с вами для подтверждения и оформления заказа!</div>
		</div>

		<form method="POST" class="modal__form" name="Заказ">
			<input type="text" class="input input--dark modal__input" name="client_name" placeholder="ФИО" required>

			<input type="tel" class="input input--dark modal__input" name="client_tel" placeholder="+ 7 ( ___ ) - ___ - __ -__" required>

			<textarea class="input input--dark modal__textarea" name="client_address" placeholder="Адрес доставки" required></textarea>

			<input type="text" class="hidden" name="client_product_name" value="">

			<input type="text" class="hidden" name="client_product_id" value="">

			<input type="text" class="hidden" name="client_product_color" value="">

			<label class="checkbox modal__policy">
				<input type="checkbox" name="policy" class="checkbox__input" required checked>
				<span class="checkbox__switcher"></span>
				<span class="checkbox__text">Даю согласие на обработку моих персональных данных в соответствии с <a href="<?php echo get_privacy_policy_url(); ?>">Политикой конфиденциальности</a></span>
			</label>

			<button class="btn modal__submit" type="submit">Отправить</button>

			<input type="text" class="hidden" name="page_request" value="<?php echo $page_title; ?>">

			<?php wp_nonce_field( 'Заказ', 'modal-order-nonce' ); ?>
		</form>
	</div>
<?php endif; ?>
