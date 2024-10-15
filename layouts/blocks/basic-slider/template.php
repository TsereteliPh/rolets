<section class="basic-slider">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'basic-slider__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true
		) ); ?>

		<?php
			$slider = get_sub_field( 'slider' );
			if ( $slider ) :
				?>

				<div class="basic-slider__slider swiper">
					<ul class="reset-list basic-slider__list swiper-wrapper">
						<?php
							foreach ( $slider as $slide ) {
								get_template_part('/layouts/partials/cards/slide-card', null, array(
									'class' => 'basic-slider__item swiper-slide',
									'img' => $slide['img'],
									'title' => $slide['title'],
									'text' => $slide['text']
								) );
							}
						?>
					</ul>

					<div class="pagination basic-slider__pagination"></div>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
