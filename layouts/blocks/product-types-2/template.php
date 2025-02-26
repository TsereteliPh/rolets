<section class="product-types-2">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'product-types-2__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$types = get_sub_field( 'types' );
			if ( $types ) :
				?>

				<ul class="reset-list product-types-2__list">
					<?php foreach ( $types as $type ) : ?>
						<li class="product-types-2__item">
							<div class="product-types-2__item-img">
								<?php echo wp_get_attachment_image( $type['img'] ? $type['img'] : 31, 'large', false ); ?>
							</div>

							<div class="product-types-2__item-info">
								<div class="product-types-2__item-title"><?php echo $type['label']; ?></div>

								<div class="product-types-2__item-price">
									<?php
										if ( $type['price'] ) {
											echo 'от ' . number_format( $type['price'], 0, ',', ' ' ) . ' руб.';
										} else {
											echo 'Цена по запросу.';
										}
									?>
								</div>

								<?php if ( ! empty( $type['link'] ) ) : ?>
									<a href="<?php echo $type['link']['url']; ?>" class="btn btn--transparent product-types-2__item-link" target="<?php echo $type['link']['target']; ?>">
										Перейти
									</a>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
