<?php get_header(); ?>

<section class="not-found">
	<div class="container not-found__container">
		<h1 class="title__text not-found__title">СТРАНИЦА НЕ НАЙДЕНА</h1>

		<div class="not-found__text">
			К сожалению, страница, которую вы ищете, не существует. Возможно, она была удалена, или вы неверно ввели адрес.<br>
			<br>
			Пожалуйста, перейдите на главную страницу и продолжите поиск нужной информации.
		</div>

		<a href="<?php echo bloginfo( 'url' ); ?>" class="btn not-found__link">
			На главную
			<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
		</a>
	</div>
</section>

<?php get_footer(); ?>
