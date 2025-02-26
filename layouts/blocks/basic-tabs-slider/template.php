<section class="basic-tabs-slider">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'basic-tabs-slider__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true
		) ); ?>

		<?php
			$tabs = get_sub_field( 'tabs' );
			if ( $tabs ) :
				?>

				<ul class="reset-list basic-tabs-slider__tabs js-tabs">
					<?php foreach ( $tabs as $key => $tab ) : ?>
						<li class="btn-tab basic-tabs-slider__tab<?php echo $key === 0 ? ' active' : ''; ?>" data-tab="basic-slider-tab-<?php echo $key; ?>">
							<?php echo $tab['label']; ?>
							<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="basic-tabs-slider__sliders">
					<?php foreach ( $tabs as $key => $tab ) : ?>
                        <div class="swiper basic-tabs-slider__slider<?php echo $key === 0 ? ' active' : ''; ?>" id="basic-slider-tab-<?php echo $key; ?>">
							<ul class="reset-list swiper-wrapper">
								<?php
									foreach ( $tab['slider'] as $key => $slide ) {
										get_template_part( '/layouts/partials/cards/slide-card', null, array(
											'class' => 'basic-tabs-slider__slide swiper-slide',
											'img' => $slide['img'],
                                            'title' => $slide['title'],
											$slide['content_type'] => $slide[$slide['content_type']],
										) );
									}
								?>
							</ul>

							<div class="pagination basic-tabs-slider__pagination"></div>
                        </div>
                    <?php endforeach;?>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
