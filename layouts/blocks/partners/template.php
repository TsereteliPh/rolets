<section class="partners">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'partners__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true
		) ); ?>

		<?php
			$partners = get_sub_field( 'partners' );
			if ( $partners ) :
				?>

				<div class="partners__slider swiper">
					<div class="partners__links swiper-wrapper">
						<?php foreach ( $partners as $partner ) : ?>
							<a <?php echo $partner['link'] ? 'href="' . $partner['link']['url'] . '"' : ''; ?> class="partners__link swiper-slide" target="<?php echo $partner['link']['target']; ?>">
								<?php echo wp_get_attachment_image( $partner['icon'], 'large', false ); ?>
							</a>
						<?php endforeach; ?>
					</div>

					<div class="pagination partners__pagination"></div>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
