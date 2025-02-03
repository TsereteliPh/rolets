<?php
	$bid = get_sub_field( 'bid' );
	$measurer = get_sub_field( 'measurer' );
	$calculator = get_sub_field( 'calculator' );
?>

<section class="order-production">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'order-production__title',
			'title' => get_sub_field( 'title' ),
		) ); ?>

		<div class="order-production__content">
			<?php if ( $bid['text'] || $bid['link'] ) : ?>
				<div class="order-production__box order-production__box--bid">
					<div class="order-production__box-content">
						<div class="order-production__box-text"><?php echo $bid['text']; ?></div>

						<?php if ( $bid['link'] ) : ?>
							<button class="btn btn--secondary order-production__box-button" type="button" data-fancybox data-src="#callback">
								<?php echo $bid['link']; ?>

								<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
							</button>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $measurer['text'] || $measurer['link'] ) : ?>
				<div class="order-production__box order-production__box--measurer">
					<div class="order-production__box-content">
						<div class="order-production__box-text"><?php echo $measurer['text']; ?></div>

						<?php if ( $measurer['link'] ) : ?>
							<button class="btn btn--secondary order-production__box-button" type="button" data-fancybox data-src="#measure">
								<?php echo $measurer['link']; ?>

								<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
							</button>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $calculator['text'] || $calculator['link'] ) : ?>
				<div class="order-production__box order-production__box--calculator">
					<div class="order-production__box-content">
						<div class="order-production__box-text"><?php echo $calculator['text']; ?></div>

						<?php if ( $calculator['link'] ) : ?>
							<a href="<?php echo $calculator['link']['url']; ?>" class="btn btn--secondary order-production__box-button" target="<?php echo $calculator['link']['target']; ?>">
								<?php echo $calculator['link']['title']; ?>

								<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
