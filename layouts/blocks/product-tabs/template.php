<section class="product-tabs">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'product-tabs__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$tabs = get_sub_field( 'tabs' );
			if ( $tabs ) :
				?>

				<ul class="reset-list product-tabs__tabs js-tabs">
					<?php foreach ( $tabs as $key => $tab ) :?>
                        <li class="btn-tab product-tabs__tab<?php echo $key === 0 ? ' active' : ''; ?>" data-tab="product-tab-<?php echo $key . '-' . $args['block_id']; ?>">
							<?php echo $tab['tab']; ?>
							<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
                        </li>
                    <?php endforeach;?>
                </ul>

				<div class="product-tabs__content">
					<?php foreach ( $tabs as $key => $tab ) :?>
                        <ul class="reset-list product-tabs__list<?php echo $key === 0 ? ' active' : ''; ?>" id="product-tab-<?php echo $key . '-' . $args['block_id']; ?>">
                            <?php
								foreach ( $tab['products'] as $post ) {
									setup_postdata( $post );

                                    get_template_part( '/layouts/partials/cards/product-card', null, array(
                                        'class' => 'product-tabs__item',
                                    ) );
								}

								wp_reset_postdata();
							?>
                        </ul>
                    <?php endforeach;?>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
