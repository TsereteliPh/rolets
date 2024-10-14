<section class="product-colors">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'product-colors__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$products = get_sub_field( 'products' );
			if ( $products ) :
				?>

				<?php if ( count( $products ) > 1 ) : ?>
					<ul class="reset-list product-colors__tabs js-tabs">
						<?php foreach ( $products as $key => $tab ) : ?>
							<li class="btn-tab product-colors__tab<?php echo $key === 0 ? ' active' : ''; ?>" data-tab="product-color-cat-<?php echo $key . '-' . $args['block_id']; ?>">
								<?php echo $tab['label']; ?>
								<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<div class="product-colors__content">
					<?php foreach ( $products as $key => $tab ) : ?>
						<ul class="reset-list product-colors__list<?php echo $key === 0 ? ' active' : ''; ?>" id="product-color-cat-<?php echo $key . '-' . $args['block_id']; ?>">
							<?php foreach ( $tab['product'] as $product ) : ?>
								<li class="product-colors__item">
									<div class="product-colors__item-img"><?php echo wp_get_attachment_image( $product['img'] ? $product['img'] : 31, 'medium', false ); ?></div>

									<div class="product-colors__item-label"><?php echo $product['product']; ?></div>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endforeach; ?>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
