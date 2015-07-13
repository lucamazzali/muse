<?php get_header(); ?>

	<div class="notFound"><h1>Page not found</h1></div>

	
	<section class="row ">

	<?php query_posts( 'post_type=brand&orderby=title&order=ASC' ); ?>
	<ul class="list-brands">
	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Codice da eseguire in caso di contenuto trovato -->
		<?php 
			// CATEGERORY E SUB CATEGORY
			$post_categories = wp_get_post_categories( $post->ID );
			$cats = array();    
			foreach($post_categories as $c){
				$cat = get_category( $c );
				if($cat->parent == 2) $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
			}
		    

			// check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'width_300' );
				$image_url = $image_url[0];
			} else {
				$image_url = get_template_directory_uri() . "/img/noPic.jpg";
			}


			$data_rows = get_field('data_location');


		?>
		<li class="<?php echo $cats[0]['slug']; ?> <?php if ( isset($cats[1]) == true ) { echo $cats[1]['slug']; } ?>">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</li>
		

	<?php endwhile; else: ?>

		<!-- Codice da eseguire in caso di contenuto non trovato -->


	<?php endif; ?>
    </ul>	
    </section><!-- end row -->
    	

<?php get_footer(); ?>