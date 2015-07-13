<?php get_header(); ?>

	<section>
		
		<?php

			$category = get_the_category( $post_id );
			$cat_parent = $category[0]->category_parent;
			echo get_cat_name( $cat_parent );
			echo $category[0]->cat_name ;
			
			if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$materiali = get_field('materiali');
				$lavorazione = get_field('lavorazione');
			?>
			<article itemscope itemtype='http://schema.org/Product'>
				<header>
					<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" itemprop="url"><h1 itemprop='name'><?php the_title(); ?></h1></a>
				</header>
				<div itemprop='description'>
					<p><?php the_content(); ?></p>
					<?php if ( $materiali ) { ?>
						<span>Materiali: <?php echo $materiali ?></span>
					<?php } ?>
					<?php if ( $lavorazione ) { ?>
						<span>Lavorazioni: <?php echo $lavorazione ?></span>
					<?php } ?>
				</div>

				<!-- galleria immagini -->
				<?php if( have_rows('galleria') ): ?>
					<figure>
					<?php while( have_rows('galleria') ): the_row(); 
						// vars
						$image = get_sub_field('immagine');
						$title_img = $image['title'];
						$large = $image['sizes']['large'];
					?>
							<?php if( $image ): ?>
								<img src="<?php echo $large; ?>" alt="<?php echo $title_img; ?>" itemprop="image"/>
							<?php endif; ?>
					<?php endwhile; ?>
					</figure>
					
			<?php endif; ?> <!-- end galleria immagini -->


		<?php endwhile; else: ?>

			<!-- Codice da eseguire in caso di contenuto non trovato -->

		<?php endif; ?>


		
	</section>

<?php get_footer(); ?>