<section class="product-types">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'product-types__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$types = get_sub_field( 'types' );
			if ( $types ) :
				?>

				<ul class="reset-list product-types__list js-accordion">
					<?php foreach ( $types as $type ) : ?>
						<li class="product-types__item">
							<button class="product-types__item-btn">
								<?php echo $type['label']; ?>

								<div class="btn-accordion product-types__item-switcher">
									<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
								</div>
							</button>

							<div class="product-types__item-content">
								<div class="product-types__item-img">
									<?php echo wp_get_attachment_image( $type['img'] ? $type['img'] : 31, 'large', false ); ?>
								</div>

								<ul class="reset-list product-types__item-characteristics">
									<?php foreach ( $type['characteristics'] as $characteristic ) : ?>
										<li class="product-types__item-characteristic">
											<?php echo $characteristic['label']; ?>

											<div class="product-types__item-rating">
												<?php for ( $i = 0; $i < 5; $i++ ) : ?>
													<svg class="product-types__item-star<?php echo $i < $characteristic['rating'] ? ' product-types__item-star--colored' : ''; ?>" width="15" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-star"></use></svg>
												<?php endfor; ?>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>

								<div class="product-types__item-panel">
									<?php if ( $type['price'] ) : ?>
										<div class="product-types__item-price"><?php echo 'от ' . $type['price'] . ' руб.'; ?></div>
									<?php endif; ?>

									<?php if ( $type['link'] ) : ?>
										<a href="<?php echo $type['link']['url']; ?>" class="btn btn--transparent product-types__item-link" target="<?php echo $type['link']['target']; ?>"><?php echo $type['link']['title'] ? $type['link']['title'] : 'Подробнее'; ?></a>
									<?php endif; ?>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
