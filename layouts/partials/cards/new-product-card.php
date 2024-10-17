<?php $importants = get_field( 'important_attributes' ); ?>
<li class="new-product-card <?php echo $args['class']; ?>">
	<div class="new-product-card__img">
		<?php
			if ( get_the_post_thumbnail_url() ) {
				the_post_thumbnail( 'large' );
			} else {
				echo wp_get_attachment_image( 31, 'large', false );
			}
		?>
	</div>

	<div class="new-product-card__content">
		<a href="<?php the_permalink(); ?>" class="new-product-card__link"><?php the_title(); ?></a>

		<button class="new-product-card__order js-order" type="button" data-fancybox data-src="#order" data-product-name="<?php the_title(); ?>" data-product-id="<?php the_ID(); ?>">
			<svg width="23" height="23"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-cart"></use></svg>
		</button>

		<?php if ( $importants['price'] ) : ?>
			<div class="new-product-card__price">
				<div class="new-product-card__price-default<?php echo $importants['price']['sale'] ? ' new-product-card__price-default--del' : ''; ?>"><?php echo $importants['price']['default'] . ' руб.'; ?></div>

				<?php if ( $importants['price']['sale_price'] ) : ?>
					<div class="new-product-card__price-sale"><?php echo $importants['price']['sale_price'] . ' руб.'; ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="new-product-card__availability"><?php echo $importants['availability'] ? 'Есть в наличии' : 'Под заказ'; ?></div>
	</div>
</li>
