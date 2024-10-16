<section class="service-links">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'service-links__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$cats = get_sub_field( 'cats' );
			if ( $cats ) :
				?>

				<ul class="reset-list service-links__list">
					<?php foreach ( $cats as $cat ) : ?>
						<?php
							$cat_link = '';
							if ( isset( $cat['link']['url'] ) ) $cat_link = 'href="'. $cat['link']['url']. '#services"';
						?>
                        <li class="service-links__item" style="background-image: url(<?php echo $cat['bg']; ?>);">
							<div class="service-links__item-label"><?php echo $cat['label']; ?></div>

							<div class="service-links__item-services">
								<?php foreach ( $cat['services'] as $service ) : ?>
									<a <?php echo $cat_link; ?> class="service-links__item-service">
										<?php echo $service['label']; ?>
										<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
									</a>
								<?php endforeach; ?>
							</div>

							<button class="btn service-links__item-btn" type="button" data-fancybox data-src="#callback">
								Запросить консультацию
								<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
							</button>
                        </li>
                    <?php endforeach; ?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
