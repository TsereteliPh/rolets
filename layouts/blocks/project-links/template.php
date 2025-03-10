<?php
	$title = get_sub_field( 'title' );
	$projects = get_sub_field( 'projects' );
?>
<section class="project-links">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'project-links__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true
		) ); ?>

        <?php if ( $projects ) : ?>
			<div class="swiper project-links__slider">
				<ul class="reset-list project-links__list swiper-wrapper">
					<?php foreach ( $projects as $post ) : ?>
						<?php setup_postdata( $post ); ?>

						<li class="project-links__item swiper-slide">
							<?php if ( get_field( 'new' ) ) : ?>
								<div class="project-links__item-new">Новый проект</div>
							<?php endif; ?>

							<div class="project-links__item-img">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'large' );
									} else {
										echo wp_get_attachment_image( 31, 'large', false );
									}
								?>
							</div>

							<div class="project-links__item-info">
								<a href="<?php echo $title['link']['url'] . '#' . 'project-' .  get_the_ID(); ?>" class="project-links__item-link">
									<?php the_title(); ?>
								</a>

								<div class="project-links__item-price"><?php echo number_format( get_field( 'price' ), 0, ',', ' ' ); ?> руб.</div>
							</div>
						</li>
					<?php endforeach; ?>

					<?php wp_reset_postdata(); ?>
				</ul>

				<div class="pagination project-links__pagination"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
