<section class="docs">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'docs__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true,
		) ); ?>

		<?php
			$docs = get_sub_field( 'docs' );
			if ( $docs ) :
				?>

				<div class="docs__slider swiper">
					<ul class="reset-list docs__list swiper-wrapper">
						<?php foreach ( $docs as $key => $doc ) : ?>
							<li class="docs__item swiper-slide">
								<div class="docs__item-title"><?php echo $doc['title']; ?></div>

								<a href="<?php echo $doc['img']['url']; ?>" class="docs__item-img" data-fancybox="doc-image-<?php echo $key; ?>">
									<?php echo wp_get_attachment_image( $doc['img']['id'] ? $doc['img']['id'] : 31, 'medium', false ); ?>
								</a>

								<?php if ( $doc['desc'] ) : ?>
									<div class="docs__item-desc"><?php echo $doc['desc']; ?></div>
								<?php endif; ?>

								<?php if ( $doc['link'] ) : ?>
									<a href="<?php echo $doc['link']; ?>" class="btn-underline docs__item-link" download>Скачать</a>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="pagination docs__pagination"></div>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
