<li class="article-card <?php echo $args['class']; ?>">
	<a href="<?php the_permalink(); ?>" class="article-card__link">
		<?php
			if ( get_the_post_thumbnail() ) {
				the_post_thumbnail( 'large', array(
					'class' => 'article-card__img'
				) );
			} else {
				echo wp_get_attachment_image( 31, 'large', false, array(
					'class' => 'article-card__img'
				) );
			}
		?>

		<div class="article-card__info">
			<?php
				$cats = get_the_category();
				if ( $cats) :
					?>

					<div class="article-card__cat">
						<?php
							foreach ( $cats as $key => $item ) {
								echo $item->name;
								echo ( count( $cats ) != $key + 1 ) ? ' , ' : '';
							}
						?>
					</div>

					<?php
				endif;
			?>

			<div class="article-card__title"><?php the_title(); ?></div>

			<?php if ( in_category( 6 ) ) : ?>
				<div class="article-card__date"><?php echo get_the_date( 'd/m/Y' ); ?></div>
			<?php endif; ?>
		</div>
	</a>
</li>
