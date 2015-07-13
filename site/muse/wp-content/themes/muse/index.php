<?php get_header(); ?>

	
	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article>
		<!--  Content  -->
		  <h1>SARTORI GOLD</h1>
		</article>

		<?php
			$video = get_field('video', 24);
			$image = get_field('immagine', 24);

			$title_img = $image['title'];
			$large = $image['sizes']['full'];
		?>

		<?php 
			if ( $video ) {
		?>
			<!-- carico video fulle screen -->
			<div id="container">
				<video id="player" autoplay preload loop data-origin-x="20" data-origin-y="40">
					<source src="<?php echo $video ?>" type="video/mp4">
					<source src="video.webm" type="video/webm">
				</video>
				<figure><img src="<?php echo $large ?>"/></figure>
			</div>
		<?php
			} else {
		?>
			<div id="container">
				<figure><img src="<?php echo $large ?>"/></figure>
			</div>
		<?php
			}
		?>

	<?php endwhile; else: ?>

		<!-- Codice da eseguire in caso di contenuto non trovato -->


	<?php endif; ?>
    	

<?php get_footer(); ?>