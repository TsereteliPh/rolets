<?php
	$text = get_sub_field( 'text' );
	$steps = get_sub_field( 'steps' );
?>
<section class="step-by-step">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'step-by-step__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php if ( $text ) : ?>
			<div class="step-by-step__text"><?php echo $text; ?></div>
		<?php endif; ?>

		<?php if ( $steps ) : ?>
			<ul class="reset-list step-by-step__list">
				<?php foreach ( $steps as $step ) : ?>
					<li class="step-by-step__item">
						<div class="step-by-step__item-label"><?php echo $step['label']; ?></div>

						<div class="step-by-step__item-text"><?php echo $step['text']; ?></div>

						<div class="step-by-step__item-arrow">
							<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
