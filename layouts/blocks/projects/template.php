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
					'posts_per_page' => 3,
					'paged' => 1,
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

		<button class="btn btn--transparent projects__btn js-show-more<?php echo ( $query->max_num_pages > 1) ? '' : ' hidden'; ?>" type="button" data-slug="projects">
			Показать еще
			<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
		</button>

		<script>
			window.projects_posts = '<?php echo json_encode($query->query_vars); ?>';
			window.projects_current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
			window.projects_max_pages = <?php echo $query->max_num_pages; ?>;
		</script>
	</div>
</section>

