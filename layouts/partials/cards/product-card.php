<?php $importants = get_field( 'important_attributes' ); ?>
<li class="product-card <?php echo $args['class']; ?>">
	<div class="product-card__img">
		<?php if ( $importants['new'] || $importants['bestseller'] ) : ?>
			<div class="product-card__img-flashes">
				<?php if ( $importants['new'] ) :?>
					<div class="product-card__img-flash product-card__img-flash--new">Новинка</div>
				<?php endif;?>

				<?php if ( $importants['bestseller'] ) :?>
					<div class="product-card__img-flash product-card__img-flash--bestseller">Бестселлер</div>
				<?php endif;?>
			</div>
		<?php endif; ?>

		<?php
			if ( get_the_post_thumbnail_url() ) {
				the_post_thumbnail( 'large' );
			} else {
				echo wp_get_attachment_image( 31, 'large', false );
			}
		?>
	</div>

	<a href="<?php the_permalink(); ?>" class="product-card__link"><?php the_title(); ?></a>

	<?php if ( $importants['price'] ) : ?>
		<div class="product-card__price">
			<div class="product-card__price-default<?php echo $importants['price']['sale'] ? ' product-card__price-default--del' : ''; ?>">
				<?php echo empty( $importants['price']['sale_price'] ) ? 'От' : ''; ?>
				<?php echo $importants['price']['default'] . ' руб.'; ?>
			</div>

			<?php if ( $importants['price']['sale_price'] ) : ?>
				<div class="product-card__price-sale">
					От
					<?php echo $importants['price']['sale_price'] . ' руб.'; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="product-card__availability"><?php echo $importants['availability'] ? 'Есть в наличии' : 'Под заказ'; ?></div>

	<button class="btn product-card__order js-order" type="button" data-fancybox data-src="#order" data-product-name="<?php the_title(); ?>" data-product-id="<?php the_ID(); ?>">
		<?php echo $importants['availability'] ? 'Заказать' : 'Предзаказ'; ?>
		<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
	</button>
</li>
