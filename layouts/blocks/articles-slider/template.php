<section class="articles-slider">
	<div class="container articles-slider__slider swiper">
		<?php
			get_template_part( '/layouts/partials/title', null, array(
				'class' => 'articles-slider__title',
				'title' => get_sub_field( 'title' )
			) );
		?>

		<ul class="reset-list articles-slider__list swiper-wrapper">
			<?php
				$query = new WP_Query( [
                    'post_type' => 'post',
                    'cat' => get_sub_field( 'content' ) === 'articles' ? 6 : 54,
                    'orderby' => 'post_date',
                    'posts_per_page' => 4,
                    'paged' => 1
                ] );

				$posts = $query->posts;

				if ( $query->have_posts() ) {
					if ( is_archive() ) {
						foreach ( $posts as $post ) {
							get_template_part('/layouts/partials/cards/article-card', null, array(
								'class' => 'articles-slider__item swiper-slide',
							) );
						}
					} else {
						while ( $query->have_posts() ) {
							$query->the_post();

							get_template_part('/layouts/partials/cards/article-card', null, array(
								'class' => 'articles-slider__item swiper-slide',
							) );
						}

						wp_reset_postdata();
					}
				}
			?>
		</ul>

		<div class="pagination articles-slider__pagination"></div>
	</div>
</section>
