<?php
	$text = get_sub_field( 'text' );
	$brands = get_sub_field( 'brands' );
?>
<section class="brands-slider">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'brands-slider__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true,
		) ); ?>

		<?php if ( $text ) : ?>
			<div class="brands-slider__text"><?php echo $text; ?></div>
		<?php endif; ?>

		<?php if ( $brands ) : ?>
			<div class="brands-slider__slider swiper">
				<ul class="reset-list brands-slider__list swiper-wrapper">
					<?php foreach ( $brands as $brand ) : ?>
                        <li class="brands-slider__item swiper-slide">
							<div class="brands-slider__item-img"><?php echo wp_get_attachment_image( $brand['img'], 'large', false ); ?></div>

							<?php if ( $brand['label'] ) : ?>
								<div class="brands-slider__item-label"><?php echo $brand['label']; ?></div>
							<?php endif; ?>

							<?php if ( $brand['text'] ) : ?>
								<div class="brands-slider__item-text"><?php echo $brand['text']; ?></div>
							<?php endif; ?>

							<?php if ( $brand['price'] ) : ?>
								<div class="brands-slider__item-price">
									Цена от
									<?php echo number_format( $brand['price'], 0, ',', ' ' ); ?>
									руб.
								</div>
							<?php endif; ?>
                        </li>
                    <?php endforeach; ?>
				</ul>

				<div class="pagination brands-slider__pagination"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
