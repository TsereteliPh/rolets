<?php $slider = get_sub_field( 'slider' ); ?>
<section class="new-products">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'new-products__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true,
		) ); ?>

		<?php if ( $slider ) : ?>
			<div class="new-products__slider swiper">
				<ul class="reset-list new-products__list swiper-wrapper">
					<?php
						foreach ( $slider as $item ) {
							$post = $item;
							setup_postdata( $post );

							get_template_part( '/layouts/partials/cards/new-product-card', null, array(
								'class' => 'new-products__item swiper-slide',
							) );
						}

						wp_reset_postdata();
					?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</section>
