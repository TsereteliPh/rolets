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
						<?php foreach ( $docs as $doc ) : ?>
							<li class="docs__item swiper-slide">
								<div class="docs__item-title"><?php echo $doc['title']; ?></div>

								<div class="docs__item-img"><?php echo wp_get_attachment_image( $doc['img'] ? $doc['img'] : 31, 'medium', false ); ?></div>

								<?php if ( $doc['desc'] ) : ?>
									<div class="docs__item-desc"><?php echo $doc['desc']; ?></div>
								<?php endif; ?>

								<?php if ( $doc['link'] ) : ?>
									<a href="<?php echo $dock['link']; ?>" class="btn-underline docs__item-link" download>Скачать</a>
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
