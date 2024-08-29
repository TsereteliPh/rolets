<?php
	$advantages = get_sub_field( 'advantages' );
	if ( $advantages ) :
		?>

		<section class="advantages">
			<div class="container advantages__container swiper">
				<ul class="reset-list advantages__list swiper-wrapper">
					<?php foreach ( $advantages as $advantage ) : ?>
						<li class="advantages__item swiper-slide">
							<div class="advantages__item-check"></div>

							<div class="advantages__item-label"><?php echo $advantage['label']; ?></div>

							<div class="advantages__item-text"><?php echo $advantage['text']; ?></div>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="pagination advantages__pagination"></div>
			</div>
		</section>

		<?php
	endif;
?>
