<?php
	global $wpdb;
	$current_term = get_queried_object();
?>

<section class="catalog">
	<section class="catalog-cats">
		<div class="container">
			<?php
				$title = get_sub_field( 'title' );

				$title['small-text'] = $title['small-text'] ?? 'Категория';
				$title['type'] = $title['type'] ?? 'h1';

				if ( $current_term->name ) {
					$title['text'] = $current_term->name;
				}

				get_template_part( '/layouts/partials/title', null, array(
					'class' => 'catalog__title',
					'title' => $title
				) );
			?>

			<?php
				$cats = false;

				if ( $current_term->ID ) {
					$cats = get_terms( array(
						'taxonomy' => 'product_cat',
						'parent' => 0,
						'hide_empty' => false
					) );
				} else if ( $current_term->term_id ) {
					$cats = get_terms( array(
						'taxonomy' => 'product_cat',
						'parent' => $current_term->term_id,
						'hide_empty' => false
					) );
				}

				if ( $cats ) :
					?>

					<ul class="reset-list catalog-cats__list">
						<?php foreach ( $cats as $cat ) : ?>
							<li class="catalog-cats__item">
								<div class="catalog-cats__img">
									<?php
										$cat_img = get_field( 'tax_img', $cat );
										echo wp_get_attachment_image( $cat_img ? $cat_img : 31, 'large', false );
									?>
								</div>

								<a href="<?php echo get_term_link( $cat->term_id, 'product_cat' ); ?>" class="catalog-cats__link"><?php echo $cat->name; ?></a>
							</li>
						<?php endforeach;?>
					</ul>

					<?php
				endif;
			?>
		</div>
	</section>

	<div class="container">
		<?php
			$tax_query = '';

			if ( $current_term->term_id ) {
				$tax_query = array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'id',
						'terms' => $current_term->term_id
					)
				);
			}

			$query = new WP_Query( [
				'post_type' => 'products',
				'tax_query' => $tax_query,
				'posts_per_page' => 9,
				'paged' => 1,
				'meta_query' => array(
					array(
						'key' => 'important_attributes_manufacturer',
						'value' => $_GET['manufacturer'] ?? '',
						'compare' => 'LIKE',
					)
				)
			] );

			if ( $query->have_posts() ) :
				?>

				<div class="catalog__content" id="catalog-content">
					<aside class="catalog__filters">
						<div class="catalog__filters-title">Категории</div>

						<form method="POST" class="catalog__filters-form">
							<div class="catalog__filters-box catalog__filters-box--cats">
								<!-- <div class="catalog__filters-label">Категории</div> -->

								<?php adem_display_terms_recursive( 'product_cat', $current_term->term_id ); ?>

								<input type="text" class="hidden" name="catalogCats" value="<?php echo $current_term->term_id; ?>">
							</div>


							<?php //? temporarily disable start ?>
							<?php if ( false ) : ?>
								<div class="catalog__filters-box catalog__filters-box--price">
									<div class="catalog__filters-label">Цена</div>

									<div class="catalog__filters-content">
										<?php
											$all_product_prices = get_transient( 'product_prices_cache' );

											if ( empty( $all_product_prices ) ) {
												$prices_meta = $wpdb->get_results( "
													SELECT pm.post_id, pm.meta_value
													FROM {$wpdb->postmeta} pm
													INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
													WHERE pm.meta_key = 'important_attributes_price_default'
													AND p.post_type = 'products'
													AND p.post_status = 'publish'
												" );

												$all_product_prices = array();

												if ( ! empty( $prices_meta ) ) {
													foreach ( $prices_meta as $meta ) {
														if ( empty( $meta->meta_value ) ) continue;

														$all_product_prices[] = $meta->meta_value;
													}
												}

												$all_product_prices = array_unique( $all_product_prices );

												set_transient( 'product_prices_cache', $all_product_prices, 3600 );
											}

											$max_price = max( $all_product_prices );
										?>

										<div class="number number--vertical number--light" data-legend="От">
											<div class="number__btn number__btn--decrement">
												<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
											</div>

											<input type="number" class="number__input" name="catalogMinPrice" value="0" min="0" max="<?php echo $max_price; ?>" step="1">

											<div class="number__btn number__btn--increment">
												<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
											</div>
										</div>

										<div class="number number--vertical number--light" data-legend="До">
											<div class="number__btn number__btn--decrement">
												<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
											</div>

											<input type="number" class="number__input" name="catalogMaxPrice" value="<?php echo $max_price; ?>" min="0" max="<?php echo $max_price; ?>" step="1">

											<div class="number__btn number__btn--increment">
												<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
											</div>
										</div>
									</div>
								</div>

								<div class="catalog__filters-box catalog__filters-box--manufacturer">
									<div class="catalog__filters-label">Производитель</div>

									<div class="catalog__filters-content">
										<?php
											$all_product_manufacturers = get_transient( 'product_manufacturers_cache' );

											if ( empty( $all_product_manufacturers ) ) {
												$manufacturers_meta = $wpdb->get_results( "
													SELECT pm.post_id, pm.meta_value
													FROM {$wpdb->postmeta} pm
													INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
													WHERE pm.meta_key = 'important_attributes_manufacturer'
													AND p.post_type = 'products'
													AND p.post_status = 'publish'
												" );

												$all_product_manufacturers = array();

												if ( ! empty( $manufacturers_meta ) ) {
													foreach ( $manufacturers_meta as $meta ) {
														if ( empty( $meta->meta_value ) ) continue;

														$all_product_manufacturers[] = $meta->meta_value;
													}
												}

												$all_product_manufacturers = array_unique( $all_product_manufacturers );

												set_transient( 'product_manufacturers_cache', $all_product_manufacturers, 3600 );
											}
										?>

										<div class="select select--light">
											<select class="select__select" name="catalogManufacturer">
												<option value="Производитель">Производитель</option>

												<?php foreach ( $all_product_manufacturers as $manufacturer ) : ?>
													<option value="<?php echo $manufacturer; ?>"<?php echo $_GET['manufacturer'] == $manufacturer ? ' selected' : ''; ?>>
														<?php echo $manufacturer; ?>
													</option>
												<?php endforeach; ?>
											</select>

											<svg class="select__toggle" width="14" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
										</div>
									</div>
								</div>

								<div class="catalog__filters-box catalog__filters-box--color">
									<div class="catalog__filters-label">Цвет</div>

									<div class="catalog__filters-content">
										<?php
											$all_product_colors = get_transient( 'product_colors_cache' );

											if ( empty( $all_product_colors ) ) {
												$colors_meta = $wpdb->get_results( "
													SELECT pm.post_id, pm.meta_key, pm.meta_value
													FROM {$wpdb->postmeta} pm
													INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
													WHERE pm.meta_key LIKE 'important_attributes_colors_%_color'
													AND p.post_type = 'products'
													AND p.post_status = 'publish'
												" );

												$all_product_colors = array();

												if ( ! empty( $colors_meta ) ) {
													foreach ( $colors_meta as $meta ) {
														if ( empty( $meta->meta_value ) ) continue;

														$all_product_colors[] = $meta->meta_value;
													}
												}

												$all_product_colors = array_unique( $all_product_colors );

												set_transient( 'product_colors_cache', $all_product_colors, 3600 );
											}
										?>

										<div class="select select--light">
											<select class="select__select" name="catalogColor">
												<option value="Цвет">Цвет</option>

												<?php foreach ( $all_product_colors as $color ) : ?>
													<option value="<?php echo $color; ?>"><?php echo $color; ?></option>
												<?php endforeach; ?>
											</select>

											<svg class="select__toggle" width="14" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
										</div>
									</div>
								</div>

								<div class="catalog__filters-box catalog__filters-box--controls">
									<?php if ( is_page( 621 ) ) : ?>
										<input type="reset" class="btn btn--transparent catalog__filters-reset" value="Очистить"></input>
									<?php else : ?>
										<a href="<?php echo get_page_link( 621 ); ?>#catalog-content" class="btn btn--transparent catalog__filters-reset">Очистить</a>
									<?php endif; ?>

									<button class="btn catalog__filters-submit" type="submit">Применить</button>
								</div>
							<?php endif; ?>
							<?php //? end ?>
						</form>
					</aside>

					<div class="catalog__wrapper">
						<ul class="reset-list catalog__list js-catalog-container">
							<?php
								while ( $query->have_posts() ) {
									$query->the_post();

									get_template_part( '/layouts/partials/cards/product-card', null, array(
										'class' => 'catalog__item',
									) );
								}

								wp_reset_postdata();
							?>
						</ul>

						<button class="btn btn--transparent catalog__btn js-show-more<?php echo ( $query->max_num_pages > 1) ? '' : ' hidden'; ?>" type="button" data-slug="catalog">
							Показать еще
							<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
						</button>

						<script>
							window.catalog_posts = '<?php echo json_encode($query->query_vars); ?>';
							window.catalog_current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
							window.catalog_max_pages = <?php echo $query->max_num_pages; ?>;
						</script>
					</div>

					<?php
						$extra = get_field( 'tax_info', $current_term );
						if ( $extra ) :
							?>

							<div class="catalog__extra"><?php echo $extra; ?></div>

							<?php
						endif;
					?>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
