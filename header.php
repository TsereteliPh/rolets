<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
	$tel = get_field( 'tel', 'options' );
	$email = get_field( 'email', 'options' );
	$socials = get_field( 'socials', 'options' );
	$header_text = get_field( 'header_text', 'options' );
?>

<header class="container--large header<?php echo is_front_page() ? ' header--index' : ''; ?>">
	<div class="container">
		<div class="header__panel">
			<div class="header__panel-city">
				Ваш город <b>Москва</b>
				<?php //TODO cities ?>
			</div>

			<div class="header__panel-content">
				<a href="<?php echo bloginfo( 'url' ); ?>" class="header__logo">
					<svg width="125" height="32"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>

					<div class="header__logo-text">Рольставни и роллеты от производителя в Москве</div>
				</a>

				<?php wp_nav_menu( array(
					'theme_location' => 'menu_main',
					'container' => '',
					'menu_id' => 'menu-main',
					'menu_class' => 'reset-list header__menu'
				) ); ?>

				<?php if ( $socials ) : ?>
					<div class="socials header__socials">
						<?php foreach ( $socials as $social ) : ?>
							<a href="<?php echo $social['link']; ?>" class="socials__link">
								<svg width="18" height="18"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $social['social']; ?>"></use></svg>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<div class="header__contacts">
					<?php if ( $email ) : ?>
						<a href="mailto:<?php echo $email; ?>" class="header__email"><?php echo $email; ?></a>
					<?php endif; ?>

					<?php if ( $tel ) : ?>
						<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="header__tel"><?php echo $tel; ?></a>
					<?php endif; ?>

					<button class="btn-underline header__callback" type="button" data-fancybox data-src="#callback">Обратный звонок</button>
				</div>

				<button class="header__burger" type="button">
					<span></span>
				</button>
			</div>
		</div>

		<div class="header__drop">
			<?php wp_nav_menu( array(
				'theme_location' => 'menu_main',
				'container' => '',
				'menu_id' => 'menu-main',
				'menu_class' => 'reset-list header__drop-menu'
			) ); ?>

			<div class="header__contacts header__drop-contacts">
				<?php if ( $email ) : ?>
					<a href="mailto:<?php echo $email; ?>" class="header__email"><?php echo $email; ?></a>
				<?php endif; ?>

				<?php if ( $tel ) : ?>
					<a href="tel:<?php echo preg_replace( '/[^0-9,+]/', '', $tel ); ?>" class="header__tel"><?php echo $tel; ?></a>
				<?php endif; ?>

				<button class="btn-underline header__callback" type="button" data-fancybox data-src="#callback">Обратный звонок</button>
			</div>

			<?php if ( $socials ) : ?>
				<div class="socials header__drop-socials">
					<?php foreach ( $socials as $social ) : ?>
						<a href="<?php echo $social['link']; ?>" class="socials__link">
							<svg width="18" height="18"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $social['social']; ?>"></use></svg>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $header_text ) : ?>
			<div class="header__info">
				<?php if ( $header_text['title'] ) : ?>
					<div class="header__info-title"><?php echo $header_text['title']; ?></div>
				<?php endif; ?>

				<?php if ( $header_text['text'] ) : ?>
					<div class="header__info-text"><?php echo $header_text['text']; ?></div>
				<?php endif; ?>

				<button class="btn btn--thick header__info-button" type="button" data-fancybox data-src="#measure">
					<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
					Заказать замер
				</button>
			</div>
		<?php endif; ?>
	</div>
</header>

<main class="main">
