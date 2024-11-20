<section class="catalog-cats">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'catalog-cats__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$cats = get_sub_field( 'cats' );
			if ( $cats ) :
				?>

				<ul class="reset-list catalog-cats__list">
					<?php foreach ( $cats as $cat ) : ?>
						<li class="catalog-cats__item">
							<div class="catalog-cats__img">
								<?php
									$cat_term = get_term( $cat, 'product_cat' );
									$cat_img = get_field( 'tax_img', $cat_term );

									echo wp_get_attachment_image( $cat_img ? $cat_img : 31, 'large', false );
								?>
							</div>

							<a href="<?php echo get_term_link( $cat_term->term_id, 'product_cat' ); ?>" class="catalog-cats__link"><?php echo $cat_term->name; ?></a>
						</li>
					<?php endforeach;?>
				</ul>

				<?php
			endif;
		?>
	</div>
</section>
