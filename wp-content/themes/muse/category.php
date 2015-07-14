<?php get_header(); ?>

	<section>

		
		<?php 
			$this_cat = get_query_var('cat');
			
			$child = get_category($this_cat);
			$parent = $child->parent;

			echo get_cat_name( $parent );
			echo get_cat_name( $this_cat );
			
			query_posts( 'post_type=prodotto&orderby=desc&posts_per_page=-1&cat='.$this_cat.'' ); ?>

		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$materiali = get_field('materiali');
				$lavorazione = get_field('lavorazione');

				$rows = get_field('galleria' ); // get all the rows
				
				$first_row = $rows[0]; // get the first row
				$first_row_image = $first_row['immagine' ]; // get the sub field value
				$title_img = $first_row_image['title'];
				$large = $first_row_image['sizes']['large'];
				
			?>
			<article itemscope itemtype='http://schema.org/Product'>
				<header>
					<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" itemprop="url"><h2 itemprop='name'><?php the_title(); ?></h2></a>
				</header>
				<div itemprop='description'>
					<p><?php the_content(); ?></p>
					<?php if ( $materiali ) { ?>
						<span>Materiali: <?php echo $materiali ?></span>
					<?php } ?>
					<?php if ( $lavorazione ) { ?>
						<span>Lavorazioni: <?php echo $lavorazione ?></span>
					<?php } ?>
					<?php if ( $large ) { ?>
						<figure><img src="<?php echo $large; ?>"  alt="<?php echo $title_img; ?>" itemprop="image"/></figure>
					<?php } ?>
				</div>
			</article>

		<?php endwhile; else: ?>

			<!-- Codice da eseguire in caso di contenuto non trovato -->

		<?php endif; ?>
    	
  </section><!-- end row -->

<?php get_footer(); ?>
