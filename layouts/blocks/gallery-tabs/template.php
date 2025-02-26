<section class="gallery-tabs">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'gallery-tabs__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$tabs = get_sub_field( 'tabs' );
			if ( $tabs ) :
				?>

				<ul class="reset-list gallery-tabs__tabs js-tabs">
					<?php foreach ( $tabs as $key => $tab ) : ?>
						<li class="btn-tab gallery-tabs__tab<?php echo $key === 0 ? ' active' : ''; ?>" data-tab="gallery-tab-<?php echo $key . '-' . $args['block_id']; ?>">
							<?php echo $tab['label']; ?>
							<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="gallery-tabs__content">
					<?php foreach ( $tabs as $key => $tab ) :?>
                        <div class="gallery-tabs__box<?php echo $key === 0 ? ' active' : ''; ?>" id="gallery-tab-<?php echo $key . '-' . $args['block_id']; ?>">
							<div class="gallery-tabs__box-content">
								<div class="gallery-tabs__box-label"><?php echo $tab['label']; ?></div>

								<div class="gallery-tabs__gallery swiper">
									<div class="swiper-wrapper">
										<?php if ( $tab['gallery'] ) : ?>
											<?php foreach ( $tab['gallery'] as $photo ) : ?>
												<a href="<?php echo $photo['url']; ?>" class="gallery-tabs__gallery-item swiper-slide" data-fancybox="tab-gallery-<?php echo $key . '-' . $args['block_id']; ?>">
													<?php echo wp_get_attachment_image( $photo['id'], 'full', false ); ?>
												</a>
											<?php endforeach; ?>
										<?php else : ?>
											<a class="gallery-tabs__gallery-item">
												<?php echo wp_get_attachment_image( 31, 'full', false ); ?>
											</a>
										<?php endif; ?>
									</div>

									<?php get_template_part( '/layouts/partials/gallery-controls', null, array(
										'class' => 'gallery-tabs__gallery-controls'
									) ); ?>
								</div>

								<?php if ( $tab['text'] ) : ?>
									<div class="gallery-tabs__box-text"><?php echo $tab['text']; ?></div>
								<?php endif; ?>

								<?php if ( $tab['link'] ) : ?>
									<a href="<?php echo $tab['link']['url']; ?>" class="btn btn--transparent gallery-tabs__box-link" target="<?php echo $tab['link']['target']; ?>">Подробнее</a>
								<?php endif; ?>
							</div>
                        </div>
                    <?php endforeach;?>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
