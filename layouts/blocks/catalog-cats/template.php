<?php
	$title = $args['title'] ?? get_sub_field( 'title' );
	$cats = $args['cats'] ?? get_sub_field( 'cats' );
?>
<section class="catalog-cats">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'catalog-cats__title',
			'title' => $title,
			'controls' => $cats ? true : false
		) ); ?>

		<?php if ( $cats ) : ?>
			<div class="catalog-cats__slider swiper">
				<ul class="reset-list catalog-cats__list swiper-wrapper">
					<?php foreach ( $cats as $cat ) : ?>
						<li class="catalog-cats__item swiper-slide">
							<div class="catalog-cats__img">
								<?php
									$cat_term = get_term( $cat, 'product_cat' );
									$cat_img = get_field( 'tax_img', $cat_term );

									echo wp_get_attachment_image( $cat_img ? $cat_img : 31, 'large', false );
								?>
							</div>

							<a href="<?php echo get_term_link( $cat_term->term_id, 'product_cat' ); ?>" class="catalog-cats__link"><?php echo $cat_term->name; ?></a>
						</li>
					<?php endforeach;?>
				</ul>

				<div class="pagination catalog-cats__pagination"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
