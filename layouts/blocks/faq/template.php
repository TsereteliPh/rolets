<section class="faq">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'faq__title',
			'title' => get_sub_field( 'title' )
		) ); ?>


		<div class="faq__content">
			<button class="btn faq__button" type="button" data-fancybox data-src="#question">
				Задать вопрос
				<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
			</button>

			<?php
				$faq = get_sub_field( 'faq' );
				if ( $faq ) :
					?>

					<ul class="reset-list js-accordion faq__list">
						<?php foreach ( $faq as $item ) : ?>
							<?php
								$post = $item;
								setup_postdata( $post );
							?>

							<li class="faq__item">
								<button class="faq__item-button">
									<?php the_title(); ?>

									<div class="faq__item-switcher">
										<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
									</div>
								</button>

								<div class="faq__item-answer"><?php echo get_field( 'answer' ); ?></div>
							</li>

						<?php
							endforeach;
							wp_reset_postdata();
						?>
					</ul>

					<?php
				endif;
			?>
		</div>
	</div>
</section>
