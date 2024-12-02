<?php
add_action( 'wp_ajax_catalog_filters', 'catalog_filters' );
add_action( 'wp_ajax_nopriv_catalog_filters', 'catalog_filters' );
function catalog_filters() {
	$response = array(
		'status' => 0,
		'message' => '<li class="catalog__item catalog__item--message">К сожалению, ничего не найдено по вашему запросу. Возможно, что-то упустили? Вы можете вернуться и посмотреть <a href="' . get_page_link( 621 ) . '">весь каталог</a>, где точно найдется то, что вас заинтересует.</li>'
	);

	$tax_query = '';
	if ( $_POST['catalogCats'] ) {
		$tax_query = array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $_POST['catalogCats']
			)
		);
	}

	$args = array(
		'post_type' => 'products',
		'tax_query' => $tax_query,
		'posts_per_page' => 9,
		'paged' => 1,
	);

	$meta_query = array(
		'relation' => 'AND',
	);

	$min_price = floatval( $_POST['catalogMinPrice'] );
	$max_price = floatval( $_POST['catalogMaxPrice'] );

	if ( $min_price <= $max_price ) {
		$meta_query[] = array(
			'relation' => 'AND',
			array(
				'key' => 'important_attributes_price_default',
				'value' => $min_price,
				'compare' => '>='
			),
			array(
                'key' => 'important_attributes_price_default',
                'value' => $max_price,
                'compare' => '<='
            )
		);
	} else {
		throw new ErrorException;
	}

	if ( $_POST['catalogManufacturer'] !== 'Производитель' ) {
		$meta_query[] = array(
            'key' => 'important_attributes_manufacturer',
            'value' => $_POST['catalogManufacturer'],
            'compare' => '='
        );
	}

	if ( $_POST['catalogColor'] !== 'Цвет' ) {
		$color_query = array(
			'relation' => 'OR',
		);

		for ( $i = 0;  $i < 10;  $i++ ) {
			$color_query[] = array(
				'key'     => "important_attributes_colors_{$i}_color",
				'value'   => $_POST['catalogColor'],
				'compare' => 'LIKE',
			);
		}

		$meta_query[] = $color_query;
	}

	$args['meta_query'] = $meta_query;

	$query = new WP_Query( $args );

	if( $query->have_posts() ) {
		$response['status'] = 1;
		$response['message'] = '';
		$response['query'] = $query->query_vars;
		$response['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 0;
		$response['max_pages'] = $query->max_num_pages;

		wp_reset_postdata();
	}

	echo json_encode( $response );
	wp_die();
}
