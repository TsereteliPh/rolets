<?php get_header(); ?>

<?php
	$gallery = get_field( 'gallery' );
	$thumbnail = get_post_thumbnail_id();
	$importants = get_field( 'important_attributes' );
	$attributes = get_field( 'attributes' );
	$desc = get_field( 'description' );
	$delivery_n_payment = get_field( 'delivery' );
	$instructions = get_field( 'instructions' );
	$analogues = get_field( 'analogues' );
?>

<section class="product">
	<div class="container">
		<h1 class="product__title"><?php the_title(); ?></h1>

		<div class="product__before-content">
			<?php if ( $importants['sku'] ) : ?>
				<div class="product__sku">Артикул: <?php echo $importants['sku']; ?></div>
			<?php endif; ?>

			<div class="product__availability<?php echo $importants['availability'] ? ' product__availability--colored' : ''; ?>"><?php echo $importants['availability'] ? 'Есть в наличии' : 'Нет в наличии'; ?></div>
		</div>

		<div class="product__content<?php echo ! $analogues ? ' product__content--no-analogues' : ''; ?>">
			<div class="product__gallery">
				<?php if ( $importants['new'] || $importants['bestseller'] ) : ?>
					<div class="product__gallery-flashes">
						<?php if ( $importants['new'] ) :?>
                            <div class="product__gallery-flash product__gallery-flash--new">Новинка</div>
                        <?php endif;?>

                        <?php if ( $importants['bestseller'] ) :?>
                            <div class="product__gallery-flash product__gallery-flash--bestseller">Бестселлер</div>
                        <?php endif;?>
					</div>
				<?php endif; ?>

				<div class="product__gallery-thumb">
					<div class="product__gallery-thumb-swiper swiper">
						<div class="product__gallery-thumb-wrapper swiper-wrapper">
							<?php if ( ! $gallery ) : ?>
								<div class="product__gallery-thumb-img swiper-slide">
									<?php echo wp_get_attachment_image( $thumbnail ? $thumbnail : 31, 'medium', false ); ?>
								</div>
							<?php else : ?>
								<?php foreach ( $gallery as $img ) : ?>
									<div class="product__gallery-thumb-img swiper-slide">
										<?php echo wp_get_attachment_image( $img, 'medium', false ); ?>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>

						<div class="controls product__gallery-thumb-controls">
							<div class="controls__prev product__gallery-thumb-prev">
								<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
							</div>

							<div class="controls__next product__gallery-thumb-next">
								<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
							</div>
						</div>
					</div>
				</div>

				<div class="product__gallery-big swiper">
					<div class="product__gallery-big-wrapper swiper-wrapper">
						<?php if ( ! $gallery ) : ?>
							<?php if ( $thumbnail ) : ?>
								<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="product__gallery-big-link swiper-slide" data-fancybox="product-gallery">
									<?php the_post_thumbnail( 'large', array(
										'class' => 'product__gallery-big-image'
									) ); ?>
								</a>
							<?php else : ?>
								<div class="product__gallery-big-link swiper-slide">
									<?php echo wp_get_attachment_image( 31, 'large', false, array(
										'class' => 'product__gallery-big-image'
									) ); ?>
								</div>
							<?php endif; ?>
						<?php else : ?>
							<?php foreach ( $gallery as $img ) : ?>
								<a href="<?php echo wp_get_attachment_image_url( $img, 'full', false ); ?>" class="product__gallery-big-link swiper-slide" data-fancybox="product-gallery">
									<?php echo wp_get_attachment_image( $img, 'large', false, array(
										'class' => 'product__gallery-big-image'
									) ); ?>
								</a>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>

					<div class="controls product__gallery-big-controls">
						<div class="controls__prev product__gallery-big-prev">
							<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>

						<div class="controls__next product__gallery-big-next">
							<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>
					</div>
				</div>
			</div>

			<a href="#product-info" class="product__link">
				Перейти к описанию
				<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
			</a>

			<div class="product__wrapper">
				<?php if ( $importants['manufacturer'] || $attributes ) : ?>
					<ul class="reset-list product__list">
						<?php if ( $importants['manufacturer'] ) : ?>
							<li class="product__item">
								Производитель
								<a href="<?php echo get_page_link( 621 ) . '?manufacturer=' . $importants['manufacturer']; ?>"><?php echo $importants['manufacturer']; ?></a>
							</li>
						<?php endif; ?>

						<?php if ( $attributes ) : ?>
							<?php foreach ( $attributes as $key => $attr ) : ?>
								<?php if ( $key > 7 ) break; ?>

								<li class="product__item">
									<?php echo $attr['label']; ?>
									<span><?php echo $attr['value']; ?></span>
								</li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				<?php endif; ?>

				<a href="#product-info" class="product__info-link">
					Перейти к описанию
					<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
				</a>

				<?php if ( $instructions ) : ?>
					<div class="product__instructions">
						<?php foreach ( $instructions as $key => $instruction ) : ?>
							<?php if ( $key > 1 ) break; ?>

							<a href="<?php echo $instruction['file']['url']; ?>" class="product__instruction" download>
								<div class="product__instruction-label"><?php echo $instruction['file']['title']; ?></div>

								<svg width="40" height="49"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-instruction"></use></svg>

								<div class="product__instruction-file">
									<?php echo $instruction['file']['subtype']; ?>
									<?php echo size_format( $instruction['file']['filesize'], 2 ); ?>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="product__panel">
				<div class="product__panel-wrapper">
					<?php if ( $importants['price'] ) : ?>
						<div class="product__price">
							<div class="product__price-default<?php echo $importants['price']['sale'] ? ' product__price-default--del' : ''; ?>"><?php echo $importants['price']['default'] . ' руб.'; ?></div>

							<?php if ( $importants['price']['sale_price'] ) : ?>
								<div class="product__price-sale"><?php echo $importants['price']['sale_price'] . ' руб.'; ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $importants['colors'] ) : ?>
						<div class="product__color">
							Цвет

							<?php if ( count( $importants['colors'] ) > 1 ) : ?>
								<div class="product__color-select-wrapper">
									<select class="product__color-select">
										<?php foreach ( $importants['colors'] as $key => $color ) : ?>
											<option value="<?php echo $color['color']; ?>"><?php echo $color['color']; ?></option>
										<?php endforeach; ?>
									</select>

									<svg width="14" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
								</div>
							<?php else : ?>
								<div class="product__color-select"><?php echo $importants['colors'][0]['color']; ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<button class="btn product__order js-order" type="button" data-fancybox data-src="#order" data-product-name="<?php the_title(); ?>" data-product-id="<?php the_ID(); ?>">
						<?php echo $importants['availability'] ? 'Заказать' : 'Предзаказ'; ?>
						<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
					</button>

					<?php if ( $importants['delivery'] ) : ?>
						<ul class="reset-list product__panel-list">
							<?php foreach ( $importants['delivery'] as $delivery ) : ?>
								<li class="product__panel-item">
									<?php echo $delivery['label']; ?>

									<?php echo ' - '; ?>

									<?php
										if ( $delivery['value'] === 'Бесплатно' ) {
											echo '<span>' . $delivery['value'] . '</span>';
										} else {
											echo $delivery['value'];
										}
									?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>

			<div class="product__info" id="product-info">
				<ul class="reset-list product__tabs js-tabs">
					<li class="product__tab active" data-tab="product-description">Описание</li>

					<?php if ( $attributes ) : ?>
						<li class="product__tab" data-tab="product-attributes">Характеристики</li>
					<?php endif; ?>

					<?php if ( $instructions ) : ?>
						<li class="product__tab" data-tab="product-instructions">Инструкции и сертификаты</li>
					<?php endif; ?>

					<?php if ( $delivery_n_payment ) : ?>
						<li class="product__tab" data-tab="product-delivery">Оплата и доставка</li>
					<?php endif; ?>
				</ul>

				<div class="product__info-box">
					<div class="product__info-content product__info-content--desc active" id="product-description"><?php echo $desc; ?></div>

					<?php if ( $attributes ) : ?>
						<ul class="reset-list product__list product__info-content product__info-content--attributes" id="product-attributes">
							<?php if ( $importants['manufacturer'] ) : ?>
								<li class="product__item">
									Производитель
									<a href="<?php echo get_page_link( 621 ) . '?manufacturer=' . $importants['manufacturer']; ?>"><?php echo $importants['manufacturer']; ?></a>
								</li>
							<?php endif; ?>

							<?php if ( $attributes ) : ?>
								<?php foreach ( $attributes as $attr ) : ?>
									<li class="product__item">
										<?php echo $attr['label']; ?>
										<span><?php echo $attr['value']; ?></span>
									</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					<?php endif; ?>

					<?php if ( $instructions ) : ?>
						<div class="product__info-content product__info-content--instructions" id="product-instructions">
							<?php foreach ( $instructions as $instruction ) : ?>
								<a href="<?php echo $instruction['file']['url']; ?>" class="product__instruction" download>
									<div class="product__instruction-label"><?php echo $instruction['file']['title']; ?></div>

									<svg width="40" height="49"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-instruction"></use></svg>

									<div class="product__instruction-file">
										<?php echo $instruction['file']['subtype']; ?>
										<?php echo size_format( $instruction['file']['filesize'], 2 ); ?>
									</div>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $delivery_n_payment ) : ?>
						<div class="product__info-content product__info-content--delivery" id="product-delivery"><?php echo $delivery_n_payment; ?></div>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( $analogues ) : ?>
				<div class="reset-list product__analogues">
					<div class="product__analogue-label">Аналоги</div>

					<ul class="reset-list product__analogues-list">
						<?php
							foreach ( $analogues as $analogue ) {
								$post = $analogue;
								setup_postdata( $post );

								get_template_part( '/layouts/partials/cards/product-card', null, array(
									'class' => 'product__analogues-item',
								) );
							}

							wp_reset_postdata();
						?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_template_part('layouts/partials/blocks'); ?>

<?php get_footer(); ?>
