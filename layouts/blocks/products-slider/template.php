<?php $slider = get_sub_field( 'slider' ); ?>
<section class="products-slider">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'products-slider__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true,
		) ); ?>

		<?php if ( $slider ) : ?>
			<div class="products-slider__slider swiper">
				<ul class="reset-list products-slider__list swiper-wrapper">
					<?php
						foreach ( $slider as $item ) {
							$post = $item;
							setup_postdata( $post );

							get_template_part( '/layouts/partials/cards/product-card', null, array(
								'class' => 'products-slider__item swiper-slide',
							) );
						}

						wp_reset_postdata();
					?>
				</ul>

				<div class="pagination products-slider__pagination"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
