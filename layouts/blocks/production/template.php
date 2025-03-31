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

										<div class="production__item-wrapper">
											<?php if ( $product['price'] ) : ?>
												<div class="production__item-price">
													От
													<span><?php echo $product['price'] . ' руб.'; ?></span>
												</div>
											<?php endif; ?>

											<?php if ( isset( $product['link']['url'] ) ) : ?>
												<a href="<?php echo $product['link']['url']; ?>" class="btn-underline production__item-link" target="<?php echo $product['link']['target']; ?>">
													Подробнее
												</a>
											<?php endif; ?>
										</div>
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

											<?php get_template_part( '/layouts/partials/gallery-controls', null, array(
												'class' => 'production__gallery-controls'
											) ); ?>
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
