<?php get_header(); ?>

	
	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Codice da eseguire in caso di contenuto trovato -->
		
		<h2>
			<a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
			<?php the_content(); ?>
		</h2>

	<?php endwhile; else: ?>

		<!-- Codice da eseguire in caso di contenuto non trovato -->


	<?php endif; ?>


<?php get_footer(); ?>