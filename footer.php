</main>

<?php
	$tel = get_field( 'tel', 'options' );
	$email = get_field( 'email', 'options' );
	$address = get_field( 'address', 'options' );
	$schedule = get_field( 'schedule', 'options' );
	$socials = get_field( 'socials', 'options' );
	$payment = get_field( 'payment', 'options' );
	$map = get_field( 'map', 'options' );
	$privacy_url = get_privacy_policy_url();

	if ( is_archive() ) {
		$page_title = get_the_archive_title();
	} else {
		$page_title = get_the_title();
	}
?>

<footer class="container--large footer">
	<div class="container">
		<div class="footer__contacts">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'footer__contacts-title',
				'title' => array(
					'small-text' => 'Контакты',
					'type' => 'h2',
					'text' => 'Контактная информация',
				)
			) ); ?>

			<div class="footer__contacts-content">
				<?php if ( $address ) : ?>
					<div class="footer__address-wrapper">
						<div class="footer__contacts-label">Адрес</div>

						<address class="footer__address"><?php echo $address; ?></address>
					</div>
				<?php endif; ?>

				<?php if ( $tel || $email || $socials ) : ?>
					<div class="footer__info-wrapper">
						<div class="footer__contacts-label">Телефон / E-mail</div>

						<div class="footer__info">
							<?php if ( $tel ) : ?>
								<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="footer__tel"><?php echo $tel; ?></a>
							<?php endif; ?>

							<?php if ( $socials ) : ?>
								<div class="socials socials--colored footer__socials">
									<?php foreach ( $socials as $social ) : ?>
										<a href="<?php echo $social['link']; ?>" class="socials__link">
											<svg width="18" height="18"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $social['social']; ?>"></use></svg>
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<?php if ( $email ) : ?>
								<a href="mailto:<?php echo $email; ?>" class="footer__email"><?php echo $email; ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $schedule ) : ?>
					<div class="footer__schedule-wrapper">
						<div class="footer__contacts-label">График работы</div>

						<div class="footer__schedule">
							Пн - Пт <span><?php echo $schedule['weekdays']; ?></span>
							Сб - Вс <span><?php echo $schedule['weekend']; ?></span>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $map ) : ?>
					<div class="footer__map">
						<?php echo wp_get_attachment_image( $map['img'] ? $map['img'] : 31, 'full', false ); ?>

						<?php if ( $map['link'] ) : ?>
							<a href="<?php echo $map['link']; ?>" class="btn footer__map-link">
								Показать на карте
								<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="footer__content">
			<div class="footer__first-column">
				<div class="footer__logo">
					<a href="<?php echo bloginfo( 'url' ); ?>" class="footer__logo-link">
						<svg width="270" height="70"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>
					</a>

					<div class="footer__logo-text">
						<span>изготовление и продажа</span> рольставней, ворот, шлагбаумов в Москве и МО
					</div>
				</div>

				<div class="footer__callback">
					<div class="footer__callback-text">
						Есть вопрос?
						<span>Оставьте номер телефона и мы вам перезвоним</span>
					</div>

					<form method="POST" class="footer__callback-form" name="Звонок">
						<input type="tel" class="input" name="client_tel" placeholder="+ 7 ( ___ ) - ___ - __ - __" required>

						<button class="btn" type="submit">Отправить</button>

						<input type="text" class="hidden" name="page_request" value="<?php echo $page_title; ?>">

						<?php wp_nonce_field( 'Звонок', 'footer-callback-nonce' ); ?>
					</form>
				</div>
			</div>

			<div class="footer__second-column">
				<ul class="reset-list footer__tabs js-tabs">
					<li class="footer__tab active" data-tab="catalog-menu">Каталог</li>

					<li class="footer__tab" data-tab="clients-menu">Клиентам</li>

					<li class="footer__tab" data-tab="services-menu">Услуги</li>
				</ul>

				<div class="footer__menus">
					<?php
						if ( is_nav_menu( 3 ) ) {
							wp_nav_menu( array(
								'theme_location' => 'footer_catalog',
								'container' => '',
								'menu_id' => 'catalog-menu',
								'menu_class' => 'reset-list footer__menu footer__menu--catalog active'
							) );
						}

						if ( is_nav_menu( 4 ) ) {
							wp_nav_menu( array(
								'theme_location' => 'footer_clients',
								'container' => '',
								'menu_id' => 'clients-menu',
								'menu_class' => 'reset-list footer__menu footer__menu--clients'
							) );
						}

						if ( is_nav_menu( 5 ) ) {
							wp_nav_menu( array(
								'theme_location' => 'footer_services',
								'container' => '',
								'menu_id' => 'services-menu',
								'menu_class' => 'reset-list footer__menu footer__menu--services'
							) );
						}
					?>
				</div>
			</div>

			<div class="footer__third-column">
				<div class="footer__mailing">
					<div class="footer__mailing-label">Подпишитесь на нашу новостную рассылку!</div>

					<div class="footer__mailing-text">Что бы получать актуальные новости, скидки и выгодные предложения.</div>

					<form method="POST" class="footer__mailing-form" name="Рассылка">
						<input type="email" class="input" name="client_email" placeholder="E - mail" required>

						<button class="btn" type="submit">Подписаться</button>

						<input type="text" class="hidden" name="page_request" value="<?php echo $page_title; ?>">

						<?php wp_nonce_field( 'Рассылка', 'footer-mailing-nonce' ); ?>
					</form>
				</div>

				<?php if ( $payment ) : ?>
					<div class="footer__payment">
						<div class="footer__payment-text">Принимаем к оплате</div>

						<div class="footer__payment-content"><?php echo wp_get_attachment_image( $payment, 'medium', false ); ?></div>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="footer__policy">
			<div>© 2006-<?php echo date( 'Y' ); ?> Компания Роллетс</div>

			<a href="<?php echo $privacy_url; ?>">Политика конфиденциальности</a>

			<a href="https://ademcorp.ru/" target="_blank">Разработка ADEM IT</a>
		</div>
	</div>
</footer>

<?php get_template_part('layouts/partials/modals'); ?>

<?php wp_footer(); ?>

</body>
</html>
