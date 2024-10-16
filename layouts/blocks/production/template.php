<section class="container--large production">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'production__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$production = get_sub_field( 'production' );
			if ( $production ) :
				?>

				<div class="production__wrapper">
					<ul class="reset-list production__list js-accordion">
						<?php foreach ( $production as $key => $product ) : ?>
							<li class="production__item">
								<button class="production__item-btn<?php echo $key === 0 ? ' active' : ''; ?>" type="button">
									<?php echo $product['tab']; ?>

									<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
								</button>

								<div class="production__item-box">
									<div class="production__item-content">
										<?php if ( $product['title'] ) : ?>
											<div class="production__item-title"><?php echo $product['title']; ?></div>
										<?php endif; ?>

										<div class="production__item-text"><?php echo $product['text']; ?></div>

										<?php if ( $product['price'] ) : ?>
											<div class="production__item-price">
												От
												<span><?php echo $product['price'] . ' руб.'; ?></span>
											</div>
										<?php endif; ?>
									</div>

									<?php if ( $product['gallery'] ) : ?>
										<div class="production__gallery swiper">
											<div class="swiper-wrapper">
												<?php foreach ( $product['gallery'] as $image ) :?>
                                                    <a href="<?php echo $image['url']; ?>" class="production__gallery-link swiper-slide" data-fancybox="production-gallery-<?php echo $key; ?>">
														<?php echo wp_get_attachment_image( $image['id'], 'full', false ); ?>
                                                    </a>
                                                <?php endforeach;?>
											</div>

											<div class="gallery-controls production__gallery-controls">
												<div class="gallery-controls__pagination production__gallery-pagination"></div>

												<div class="gallery-controls__prev production__gallery-prev">
													<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
												</div>

												<div class="gallery-controls__next production__gallery-next">
													<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
												</div>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
