<?php $options = get_sub_field( 'options' ); ?>
<section class="container--large rolets-calc" id="calculator">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'rolets-calc__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<form method="POST" class="rolets-calc__form" name="Калькулятор">
			<div class="rolets-calc__form-box rolets-calc__form-box--name">
				<div class="rolets-calc__form-label" data-calc-label="">ФИО</div>

				<div class="rolets-calc__form-content">
					<input type="text" class="input input--dark modal__input" name="client_name" placeholder="ФИО" required>
				</div>
			</div>

			<div class="rolets-calc__form-box rolets-calc__form-box--tel">
				<div class="rolets-calc__form-label" data-calc-label="">Телефон</div>

				<div class="rolets-calc__form-content">
					<input type="tel" class="input input--dark modal__input" name="client_tel" placeholder="+ 7 ( ___ ) - ___ - __ -__" required>
				</div>
			</div>

			<div class="rolets-calc__form-box rolets-calc__form-box--sizes">
				<div class="rolets-calc__form-label">Размеры</div>

				<div class="rolets-calc__form-content">
					<div class="number" data-legend="Ширина, см">
						<div class="hidden" data-calc-label="client_calc_width">Ширина, см</div>

						<div class="number__btn number__btn--decrement">
							<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>

						<input type="number" class="number__input" name="client_calc_width" value="100" min="0" step="10" required>

						<div class="number__btn number__btn--increment">
							<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>
					</div>

					<div class="number" data-legend="Высота, см">
						<div class="hidden" data-calc-label="client_calc_height">Высота, см</div>

						<div class="number__btn number__btn--decrement">
							<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>

						<input type="number" class="number__input" name="client_calc_height" value="100" min="0" step="10" required>

						<div class="number__btn number__btn--increment">
							<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>
					</div>
				</div>
			</div>

			<div class="rolets-calc__form-box rolets-calc__form-box--automation">
				<div class="rolets-calc__form-label" data-calc-label="client_calc_automation">Автоматика</div>

				<div class="rolets-calc__form-content radio-bricks">
					<label class="radio-bricks__elem">
						<input type="radio" class="radio-bricks__input" name="client_calc_automation" value="Ручное управление" checked>
						<span class="radio-bricks__text">Ручное управление</span>
					</label>

					<label class="radio-bricks__elem">
						<input type="radio" class="radio-bricks__input" name="client_calc_automation" value="Автоматическое">
						<span class="radio-bricks__text">Автоматическое</span>
					</label>
				</div>
			</div>

			<div class="rolets-calc__form-box rolets-calc__form-box--qty">
				<div class="rolets-calc__form-label" data-calc-label="client_calc_qty">Количество</div>

				<div class="rolets-calc__form-content">
					<div class="number">
						<div class="number__btn number__btn--decrement">
							<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>

						<input type="number" class="number__input" name="client_calc_qty" value="1" min="1" step="1">

						<div class="number__btn number__btn--increment">
							<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
						</div>
					</div>
				</div>
			</div>

			<div class="rolets-calc__form-box rolets-calc__form-box--instalation">
				<div class="rolets-calc__form-label" data-calc-label="client_calc_instalation">Монтаж</div>

				<div class="rolets-calc__form-content radio-bricks">
					<label class="radio-bricks__elem">
						<input type="radio" class="radio-bricks__input" name="client_calc_instalation" value="Нужен" checked>
						<span class="radio-bricks__text">Нужен</span>
					</label>

					<label class="radio-bricks__elem">
						<input type="radio" class="radio-bricks__input" name="client_calc_instalation" value="Не нужен">
						<span class="radio-bricks__text">Не нужен</span>
					</label>
				</div>
			</div>

			<?php if ( $options ) : ?>
				<?php foreach ( $options as $option ) : ?>
					<div class="rolets-calc__form-box rolets-calc__form-box--<?php echo $option['label_lat']; ?>">
						<div class="rolets-calc__form-label" data-calc-label="client_calc_<?php echo $option['label_lat']; ?>">
							<?php echo $option['label_cyr']; ?>
						</div>

						<div class="rolets-calc__form-content">
							<div class="select">
								<select class="select__select" name="client_calc_<?php echo $option['label_lat']; ?>">
									<?php foreach ( $option['options'] as $option ) : ?>
										<option value="<?php echo $option['option']; ?>"><?php echo $option['option']; ?></option>
									<?php endforeach; ?>
								</select>

								<svg class="select__toggle" width="14" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

			<div class="rolets-calc__form-box rolets-calc__form-box--controls">
				<div class="rolets-calc__form-policy">
					Отправляя заявку, вы соглашаетесь с <a href="<?php echo get_privacy_policy_url();?>">политикой конфиденциальности</a><br>
					<br>
					После <b>отправки заявки</b> наш менеджер свяжется с вами в удобное время и озвучит окончательную стоимость проекта
				</div>

				<button class="btn btn--thick rolets-calc__form-submit" type="submit">
					<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
					Отправить заявку
				</button>
			</div>

			<input type="text" class="hidden" name="page_request" value="<?php echo is_archive() ? get_the_archive_title() : get_the_title(); ?>">

			<?php wp_nonce_field( 'Калькулятор', 'modal-calc-nonce' ); ?>
		</form>
	</div>
</section>
