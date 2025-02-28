<section class="projects">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'projects__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<ul class="reset-list projects__list js-show-more-container">
			<?php
				$query = new WP_Query( [
					'post_type' => 'projects',
					'posts_per_page' => -1,
				] );

				$posts = $query->posts;

				if ( $query->have_posts() ) {
					if ( is_archive() ) {
						foreach ( $posts as $post ) {
							get_template_part('/layouts/partials/cards/project-card', null, array(
								'class' => 'projects__item',
							) );
						}
					} else {
						while ( $query->have_posts() ) {
							$query->the_post();

							get_template_part('/layouts/partials/cards/project-card', null, array(
								'class' => 'projects__item',
							) );
						}

						wp_reset_postdata();
					}
				}
			?>
		</ul>
	</div>
</section>

