<?php
	$text = get_sub_field( 'text' );
	$profiles = get_sub_field( 'profiles' );
?>
<section class="profiles-slider">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'profiles-slider__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php if ( $text ) : ?>
			<div class="profiles-slider__text"><?php echo $text; ?></div>
		<?php endif; ?>

		<?php if ( $profiles ) : ?>
			<div class="profiles-slider__slider swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<table class="profiles-slider__table">
							<tbody>
								<tr class="profiles-slider__table-row profiles-slider__table-row--first">
									<td class="profiles-slider__table-data profiles-slider__table-data--first">Профиль / характеристика</td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data profiles-slider__table-data--img">
											<div class="profiles-slider__table-img"><?php echo wp_get_attachment_image( $profile['img'], 'large', false ); ?></div>
										</td>
									<?php endforeach; ?>
								</tr>
								<tr class="profiles-slider__table-row">
									<td class="profiles-slider__table-data profiles-slider__table-data--first"></td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data profiles-slider__table-data--label"><?php echo $profile['label']; ?></td>
									<?php endforeach; ?>
								</tr>
								<tr class="profiles-slider__table-row">
									<td class="profiles-slider__table-data profiles-slider__table-data--first">Высота профиля, мм</td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data"><?php echo $profile['height']; ?></td>
									<?php endforeach; ?>
								</tr>
								<tr class="profiles-slider__table-row">
									<td class="profiles-slider__table-data profiles-slider__table-data--first">Площадь полотна, м. кв.</td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data"><?php echo $profile['area']; ?></td>
									<?php endforeach; ?>
								</tr>
								<tr class="profiles-slider__table-row">
									<td class="profiles-slider__table-data profiles-slider__table-data--first">Толщина полотна, мм</td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data"><?php echo $profile['thickness']; ?></td>
									<?php endforeach; ?>
								</tr>
								<tr class="profiles-slider__table-row">
									<td class="profiles-slider__table-data profiles-slider__table-data--first">Теплосбережение</td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data"><?php echo $profile['heat_saving']; ?></td>
									<?php endforeach; ?>
								</tr>
								<tr class="profiles-slider__table-row">
									<td class="profiles-slider__table-data profiles-slider__table-data--first">Взломостойкость</td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data"><?php echo $profile['burglary_resistance']; ?></td>
									<?php endforeach; ?>
								</tr>
								<tr class="profiles-slider__table-row">
									<td class="profiles-slider__table-data profiles-slider__table-data--first">Сферы применения</td>
									<?php foreach ( $profiles as $profile ) : ?>
										<td class="profiles-slider__table-data"><?php echo $profile['applications']; ?></td>
									<?php endforeach; ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="profiles-slider__scrollbar swiper-scrollbar"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
