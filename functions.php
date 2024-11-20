<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'adem_setup' ) ) {
	function adem_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'editor-styles' );
		add_editor_style();

		register_nav_menus(
			array(
				'menu_main' => 'Основное меню',
				'footer_catalog' => 'Меню-каталог',
				'footer_clients' => 'Меню для клиентов',
				'footer_services' => 'Меню услуг',
			)
		);
	}

	//	register thumbnails
//	add_image_size( '123x123', 123, 123, true );

	//register taxonomies
	register_taxonomy( 'product_cat', [ 'products' ], [
		'label'                 => '',
		'labels'                => [
			'name'              => 'Категории товаров',
			'singular_name'     => 'Категория товара',
			'search_items'      => 'Найти категорию',
			'all_items'         => 'Все категории',
			'view_item '        => 'Посмотреть категорию',
			'edit_item'         => 'Редактировать категорию',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить новую категорию',
			'new_item_name'     => 'Новое название категории',
			'menu_name'         => 'Категории товаров',
			'back_to_items'     => '← Вернуться к категориям',
		],
		'public'            => true,
		'hierarchical'      => true,
		'show_admin_column' => true,
		'rewrite'           => array(
			'slug'         => 'products',
			'with_front'   => false,
			'hierarchical' => true
		),
	] );

	//	register post types
	register_post_type( 'review', [
		'label' => null,
		'labels' => [
			'name' => 'Отзывы',
			'singular_name' => 'Отзыв',
			'add_new' => 'Добавить отзыв',
			'add_new_item' => 'Добавить отзыв',
			'edit_item' => 'Редактировать отзыв',
			'new_item' => 'Новый отзыв',
			'view_item' => 'Смотреть отзыв',
			'search_items' => 'Найти отзыв',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Отзывы',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-format-chat',
		'supports' => ['title', 'thumbnail'],
		'taxonomies' => ['review_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => false
	] );

	register_post_type( 'faq', [
		'label' => null,
		'labels' => [
			'name' => 'Вопрос - ответ',
			'singular_name' => 'Вопрос - ответ',
			'add_new' => 'Добавить вопрос',
			'add_new_item' => 'Добавить вопрос',
			'edit_item' => 'Редактировать вопрос',
			'new_item' => 'Новый вопрос',
			'view_item' => 'Смотреть вопрос',
			'search_items' => 'Найти вопрос',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Вопрос - ответ',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 22,
		'menu_icon' => 'dashicons-editor-help',
		'supports' => ['title'],
		'taxonomies' => ['faq_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => false
	] );

	register_post_type( 'products', [
		'label' => null,
		'labels' => [
			'name' => 'Товар',
			'singular_name' => 'Товар',
			'add_new' => 'Добавить товар',
			'add_new_item' => 'Добавить товар',
			'edit_item' => 'Редактировать товар',
			'new_item' => 'Новый товар',
			'view_item' => 'Смотреть товар',
			'search_items' => 'Найти товар',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Товары',
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => array(
			'slug'       => 'products/%product_cat%',
			'with_front' => false
		),
		'taxonomies'  => array( 'product_cat' ),
		'menu_position' => 23,
		'menu_icon' => 'dashicons-cart',
		'supports' => ['title', 'thumbnail'],
		'publicly_queryable' => true
	] );

	register_post_type( 'projects', [
		'label' => null,
		'labels' => [
			'name' => 'Проекты',
			'singular_name' => 'Проект',
			'add_new' => 'Добавить проект',
			'add_new_item' => 'Добавить проект',
			'edit_item' => 'Редактировать проект',
			'new_item' => 'Новый проект',
			'view_item' => 'Смотреть проект',
			'search_items' => 'Найти проект',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Портфолио',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 24,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => ['title', 'thumbnail'],
		'taxonomies' => ['project_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => false
	] );
}

add_action( 'after_setup_theme', 'adem_setup' );

// Return classic widgets
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', 'adem_scripts' );
function adem_scripts() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/vendor/css/fancybox.css', array(), '4.0.31' );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/vendor/js/fancybox.umd.js', array(), '4.0.31', true );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendor/css/swiper-bundle.min.css', array(), '10.3.1' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/vendor/js/swiper-bundle.min.js', array(), '10.3.1', true );
	wp_enqueue_style( 'adem', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_script( 'adem', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true ); //! change to minified version
	wp_localize_script( 'adem', 'adem_ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
}

// disable scale images
add_filter( 'big_image_size_threshold', '__return_false' );

// remove prefix in archive title
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

// excerpt
function adem_excerpt( $limit, $ID = null ) {
	return mb_substr( get_the_excerpt( $ID ), 0, $limit ) . '...';
}

// Custom breadcrumbs yoast
add_filter( 'wpseo_breadcrumb_links', 'custom_breadcrumbs' );
function custom_breadcrumbs( $links ) {
	global $post;

	if ( in_category( 6 ) && is_single() ) {
		$breadcrumb[] = array(
			'url' => get_category_link( 6 ),
			'text' => 'Статьи',
		);

		array_splice( $links, 1, -2, $breadcrumb );
	} else if ( is_archive() || is_tax() ) {
		$current_term = get_queried_object();

		if ( $current_term->taxonomy == 'product_cat' ) {
			$links[1]['url'] = str_replace( 'product_cat/', 'products/', $links[1]['url'] );

			$breadcrumb[] = array(
				'url' => get_page_link( 621 ),
				'text' => 'Товар',
			);

			array_splice( $links, 1, 0, $breadcrumb );
		}
	} else if ( is_singular( 'products' ) ) {
		$links[2]['url'] = str_replace( 'product_cat/', 'products/', $links[2]['url'] );
	}

	return $links;
}

// Display product cats recursive function
function adem_display_terms_recursive( $taxonomy, $current_term_id, $parent_id = 0 ) {
	$without_parents = $parent_id === 0;

    $terms = get_terms( array(
        'taxonomy' => $taxonomy,
        'parent' => $parent_id,
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		if ( $without_parents ) {
			echo '<ul class="reset-list filter-cats">';
		} else {
			echo '<ul>';
		}

        foreach ( $terms as $term ) {
			if ( $without_parents ) {
				echo '<li class="filter-cats__item js-accordion">';
			} else {
				echo '<li>';
			}

			if ( $without_parents ) echo '<button class="filter-cats__item-button" type="button">';

            echo '<a href="' . get_term_link( $term ) . '" class="filter-cats__item-link' . ( $term->term_id === $current_term_id ? ' filter-cats__item-link--current' : '' ) . '">' . $term->name . '</a>';

			if ( $without_parents ) {
				if ( get_terms( array( 'taxonomy' => $taxonomy, 'parent' => $term->term_id ) ) ) {
					echo '<svg width="14" height="14"><use xlink:href="' .get_template_directory_uri() . '/assets/images/sprite.svg#icon-controls-arrow"></use></svg>';
				}

				echo '</button>';
			}

            adem_display_terms_recursive( $taxonomy, $current_term_id, $term->term_id );

            echo '</li>';
        }

        echo '</ul>';
    }
}

//! start temporarily fix acf extended pro
// ACFE 0.9.0.5: Fix compatibility with clone on ACF 6.3.2
add_action('acf/init', 'my_acfe_fix_clone', 100);
function my_acfe_fix_clone(){

    $instance = acf_get_instance('acfe_field_clone');
    remove_action('wp_ajax_acf/fields/clone/query', array($instance, 'ajax_query'), 5);

}

// ACFE 0.9.0.5: Fix compatibility with fields on ACF 6.3.2
add_action('acf/input/admin_print_footer_scripts', 'my_acfe_fix_form_fields');
function my_acfe_fix_form_fields(){
    ?>
    <script>
    (function($){

        if(typeof acf === 'undefined' || typeof acfe === 'undefined'){
            return;
        }

        new acf.Model({
            filters: {
                'select2_ajax_data/action=acfe/form/map_field_groups_ajax':      'ajaxData',
                'select2_ajax_data/action=acfe/form/map_field_ajax':             'ajaxData',
                'select2_ajax_data/action=acf/fields/acfe_taxonomy_terms/query': 'ajaxData',
            },

            ajaxData: function(ajaxData, data, $el, field, select){
                ajaxData.nonce = acf.get('nonce');
                return ajaxData;
            },
        });

    })(jQuery);
    </script>
    <?php
}
//! end

add_filter( 'post_type_link', 'filter_catalog_post_link', 10, 2 );
function filter_catalog_post_link( $post_link, $post ) {
	if ( $post->post_type === 'products' ) {
		$terms = wp_get_post_terms( $post->ID, 'product_cat' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			$term_slug = '';

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$term      = $terms[0];
				$ancestors = get_ancestors( $term->term_id, 'product_cat' );

				$slugs = array_reverse( array_map( function ( $ancestor_id ) {
					$ancestor_term = get_term( $ancestor_id, 'product_cat' );

					return $ancestor_term->slug;
				}, $ancestors ) );

				$slugs[] = $term->slug;

				$term_slug = implode( '/', $slugs );
			}

			$post_link = str_replace( '%product_cat%', $term_slug, $post_link );
		} else {
			$post_link = str_replace( '%product_cat%', 'uncategorized', $post_link );
		}
	}

	return $post_link;
}

add_action( 'init', 'catalog_rewrite_rules', 10 );
function catalog_rewrite_rules( $flash = false ) {
	$terms = get_terms( array(
		'taxonomy'   => 'product_cat',
		'post_type'  => 'products',
		'hide_empty' => false,
	) );

	if ( $terms && ! is_wp_error( $terms ) ) {
		$site_url = esc_url( home_url( '/' ) );

		foreach ( $terms as $term ) {
			$term_slug = $term->slug;
			$base_term = str_replace( $site_url, '', get_term_link( $term->term_id, 'product_cat' ) );

			add_rewrite_rule( $base_term . '?$', 'index.php?product_cat=' . $term_slug, 'top' );
			add_rewrite_rule( $base_term . '/page/([0-9]{1,})/?$', 'index.php?product_cat=' . $term_slug . '&paged=$matches[1]', 'top' );
			add_rewrite_rule( $base_term . '(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?product_cat=' . $term_slug . '&feed=$matches[1]', 'top' );

		}
	}

	add_rewrite_rule(
		'^products/([^/]+)/([^/]+)/?$',
		'index.php?product_cat=$matches[1]&products=$matches[2]',
		'top'
	);

	add_rewrite_rule(
		'^products/([^/]+)/([^/]+)/([^/]+)/?$',
		'index.php?product_cat=$matches[1]/$matches[2]&products=$matches[3]',
		'top'
	);

	add_rewrite_rule(
		'^products/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$',
		'index.php?product_cat=$matches[1]/$matches[2]/$matches[3]&products=$matches[4]',
		'top'
	);

	if ( $flash === true ) {
		update_option( 'rewrite_rules', '' );
	}
}

add_action( 'create_catalog_category', 'create_term_flash_rewrite_rules', 10, 2 );
function create_term_flash_rewrite_rules( $term_id, $taxonomy ) {
	catalog_rewrite_rules( true );
}



require 'inc/acf.php';
require 'inc/load-more.php';
require 'inc/catalog-filters.php';
require 'inc/mail.php';
require 'inc/svg.php';
require 'inc/tiny-mce.php';
require 'inc/traffic.php';
