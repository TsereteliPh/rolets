<section class="container--large extra-options">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'extra-options__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$options = get_sub_field( 'options' );
			if ( $options ) :
				?>

				<div class="extra-options__wrapper">
					<ul class="reset-list extra-options__list js-accordion">
						<?php foreach ( $options as $key => $option ) : ?>
							<li class="extra-options__item">
								<button class="extra-options__item-btn<?php echo $key === 0 ? ' active' : ''; ?>" type="button">
									<?php echo $option['label']; ?>

									<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
								</button>

								<div class="extra-options__item-box">
									<div class="extra-options__item-content">
										<div class="extra-options__item-text"><?php echo $option['text']; ?></div>
									</div>

									<?php if ( $option['gallery'] ) : ?>
										<div class="extra-options__gallery swiper">
											<div class="swiper-wrapper">
												<?php foreach ( $option['gallery'] as $image ) :?>
                                                    <a href="<?php echo $image['url']; ?>" class="extra-options__gallery-link swiper-slide" data-fancybox="extra-options-gallery-<?php echo $key; ?>">
														<?php echo wp_get_attachment_image( $image['id'], 'full', false ); ?>
                                                    </a>
                                                <?php endforeach;?>
											</div>

											<div class="gallery-controls extra-options__gallery-controls">
												<div class="gallery-controls__pagination extra-options__gallery-pagination"></div>

												<div class="gallery-controls__prev extra-options__gallery-prev">
													<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
												</div>

												<div class="gallery-controls__next extra-options__gallery-next">
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
