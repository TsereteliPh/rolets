<?php
add_action( 'wp_ajax_load_more', 'load_more' );
add_action( 'wp_ajax_nopriv_load_more', 'load_more' );
function load_more() {
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );

	$return_html = '';
	if( $query->have_posts() ) {
		while( $query->have_posts() ) {
			$query->the_post();
			if ( $args['post_type'] == 'review' ) {
				$return_html .= get_template_part( 'layouts/partials/cards/review-card', null, array(
					'class' => 'reviews__item'
				) );
			} else if ( $args['post_type'] == 'projects' ) {
				$return_html .= get_template_part( 'layouts/partials/cards/project-card', null, array(
					'class' => 'projects__item'
				) );
			} else if ( $args['cat'] == 6 || $args['cat'] == 54 ) {
				$return_html .= get_template_part( 'layouts/partials/cards/article-card', null, array(
					'class' => 'archive-block__item'
				) );
			} else if ( $args['post_type'] == 'products' ) {
				$return_html .= get_template_part( 'layouts/partials/cards/product-card', null, array(
					'class' => 'catalog__item'
				) );
			}
		}
		wp_reset_postdata();
	}

	echo $return_html;
	wp_die();
}
