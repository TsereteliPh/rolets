<?php get_header(); ?>

<?php $current_term = get_queried_object(); ?>

<?php if ( in_category( 6 ) || in_category( 54 ) ) : ?>
	<section class="archive-block">
		<div class="container">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'archive-block__title',
				'title' => array(
					'small-text' => in_category( 6 ) ? 'Статьи' : 'Новости',
					'type' => 'h1',
					'text' => in_category( 6 ) ? 'Наши статьи' : 'Наши новости'
				)
			) ); ?>

			<ul class="reset-list archive-block__list js-show-more-container">
				<?php
					$query = new WP_Query( [
						'post_type' => 'post',
						'cat' => in_category( 6 ) ? 6 : 54,
						'orderby' => 'post_date',
						'posts_per_page' => 8,
						'paged' => 1
					] );

					$posts = $query->posts;

					if ( $query->have_posts() ) {
						if ( is_archive() ) {
							foreach ( $posts as $post ) {
								get_template_part('/layouts/partials/cards/article-card', null, array(
									'class' => 'archive-block__item',
								) );
							}
						} else {
							while ( $query->have_posts() ) {
								$query->the_post();

								get_template_part('/layouts/partials/cards/article-card', null, array(
									'class' => 'archive-block__item',
								) );
							}

							wp_reset_postdata();
						}
					}
				?>
			</ul>

			<button class="btn btn--transparent archive-block__btn js-show-more<?php echo ( $query->max_num_pages > 1) ? '' : ' hidden'; ?>" type="button" data-slug="articles">
				Показать еще
				<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
			</button>

			<script>
				window.articles_posts = '<?php echo json_encode($query->query_vars); ?>';
				window.articles_current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
				window.articles_max_pages = <?php echo $query->max_num_pages; ?>;
			</script>
		</div>
	</section>
<?php elseif ( $current_term->taxonomy === 'product_cat' ) : ?>
	<?php get_template_part( 'layouts/blocks/catalog/template', null ); ?>
<?php endif; ?>

<?php get_template_part( 'layouts/partials/blocks', null, array(
	'id' => 'term_' . $current_term->term_id
) ); ?>

<?php get_footer(); ?>
