<?php
/*
Template Name: Eventi
*/
?>

<?php get_header(); ?>

	<?php 
		query_posts( 'post_type=evento&orderby=desc&posts_per_page=-1' );
	?>

	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section>
			<article>
				<!-- Codice da eseguire in caso di contenuto trovato -->
				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
				<?php the_content(); ?>

				
				<?php
					$id = get_the_ID();

					$data = get_field('data', $id);
					$datafineevento = get_field('data-fine-evento');
					$localita = get_field('localita');
				?>
				<ul>
					<?php if( $data ): ?><li>data inizio: <?php echo $data ?></li><?php endif; ?>
					<?php if( $datafineevento ): ?><li>data fine: <?php echo $datafineevento ?></li><?php endif; ?>
					<?php if( $localita ): ?><li>località: <?php echo $localita ?></li><?php endif; ?>
				</ul>
			</article>
		</section>

	<?php endwhile; else: ?>

		<!-- Codice da eseguire in caso di contenuto non trovato -->


	<?php endif; wp_reset_query(); ?>

	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section>
			<article>
				<?php the_content(); ?>
			</article>
		</section>

	<?php endwhile; else: ?>

		<!-- Codice da eseguire in caso di contenuto non trovato -->


	<?php endif; wp_reset_query(); ?>

<?php get_footer(); ?>