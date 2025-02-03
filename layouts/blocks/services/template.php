<section class="services" id="services">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'services__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$services = get_sub_field( 'services' );
			if ( $services ) :
				?>

				<ul class="reset-list services__tabs js-tabs">
					<?php foreach ( $services as $key => $service ) :?>
                        <li class="btn-tab services__tab<?php echo $key === 0 ? ' active' : ''; ?>" data-tab="service-tab-<?php echo $key; ?>">
							<?php echo $service['label']; ?>

							<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
                        </li>
                    <?php endforeach;?>
				</ul>

				<div class="services__content">
					<?php foreach ( $services as $key => $service ) : ?>
                        <div class="services__box<?php echo $key === 0 ? ' active' : ''; ?>" id="service-tab-<?php echo $key; ?>">
                            <div class="services__box-label"><?php echo $service['label']; ?></div>

							<?php if ( $service['text'] ) : ?>
								<div class="services__box-text<?php echo $service['img'] ? '' : ' services__box-text--thick'; ?>"><?php echo $service['text']; ?></div>
							<?php endif; ?>

							<?php if ( $service['img'] ) : ?>
								<div class="services__box-img"><?php echo wp_get_attachment_image( $service['img'], 'large', false ); ?></div>
							<?php endif; ?>

							<button class="btn btn--secondary services__box-btn js-service-btn" type="button" data-fancybox data-src="#service" data-service-title="<?php echo $service['label']; ?>">
								Заказать
							</button>
                        </div>
                    <?php endforeach; ?>
				</div>

				<?php
			endif;
		?>
	</div>
</section>
