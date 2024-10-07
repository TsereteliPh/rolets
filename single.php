<?php get_header(); ?>

<?php if ( in_category( 6 ) ) : ?>
	<section class="single-article">
		<div class="container">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'single-article__title',
				'title' => array(
					'small-text' => 'Статья',
					'type' => 'h1',
					'text' => get_the_title()
				)
			) ); ?>

			<?php
				$content = get_field( 'article_text' );
				if ( $content ) :
					?>

					<div class="single-article__content"><?php echo $content; ?></div>

					<?php
				endif;
			?>
		</div>
	</section>
<?php endif; ?>

<?php get_template_part('layouts/partials/blocks'); ?>

<?php get_footer(); ?>
