<?php
	$text = get_sub_field( 'text' );
	$advantages = get_sub_field( 'advantages' );
?>

<section class="advantages">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'advantages__title',
			'title' => get_sub_field( 'title' ),
			'controls' => true
		) ); ?>

		<?php if ( $text ) : ?>
			<div class="advantages__text"><?php echo $text; ?></div>
		<?php endif; ?>

		<?php if ( $advantages ) : ?>
			<div class="advantages__slider swiper">
				<ul class="reset-list advantages__list swiper-wrapper">
					<?php foreach ( $advantages as $advantage ) : ?>
						<li class="corner-border advantages__item swiper-slide">
							<div class="corner-border__helper"></div>

							<div class="advantages__item-check"></div>

							<div class="advantages__item-label"><?php echo $advantage['label']; ?></div>

							<div class="advantages__item-text"><?php echo $advantage['text']; ?></div>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="pagination advantages__pagination"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
