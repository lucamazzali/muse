<?php
/*
Template Name: Contatti
*/
?>

<?php get_header(); ?>

	
	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Codice da eseguire in caso di contenuto trovato -->
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>

		<!-- galleria immagini -->
		<?php if( have_rows('indirizzo') ): ?>
			<ul>
			<?php while( have_rows('indirizzo') ): the_row(); 
				// vars
				$titolo = get_sub_field('titolo');
				$indirizzo = get_sub_field('indirizzo');
				$cap = get_sub_field('cap');
				$citta = get_sub_field('citta');
				$telefono = get_sub_field('telefono');
				$fax = get_sub_field('fax');
				$email = get_sub_field('email');
				$email2 = get_sub_field('email-2');
			?>
				
				<?php if( $titolo ): ?><li><?php echo $titolo ?></li><?php endif; ?>
				<?php if( $indirizzo ): ?><li><?php echo $indirizzo ?></li><?php endif; ?>
				<?php if( $cap ): ?><li><?php echo $cap ?></li><?php endif; ?>
				<?php if( $citta ): ?><li><?php echo $citta ?></li><?php endif; ?>
				<?php if( $telefono ): ?><li><?php echo $telefono ?></li><?php endif; ?>
				<?php if( $fax ): ?><li><?php echo $fax ?></li><?php endif; ?>
				<?php if( $email ): ?><li><?php echo $email ?></li><?php endif; ?>
				<?php if( $email2 ): ?><li><?php echo $email2 ?></li><?php endif; ?>
				
			<?php endwhile; ?>
			</ul>
		<?php endif; ?> <!-- end galleria immagini -->



		<!-- MAppa -->
		<?php
			$latitudine = get_field('latitudine');
			$longitudine = get_field('longitudine');
			

			if ( $latitudine ) {
		?>

			<script type="text/javascript">
			  function initialize() {
			  	var latlng = new google.maps.LatLng(<?php echo $latitudine ?>, <?php echo $longitudine ?>);
			    var myOptions = {
			      zoom: 17,
			      center: latlng,
			      mapTypeId: google.maps.MapTypeId.ROADMAP,
			      styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
			    };
			     
			    var map = new google.maps.Map(document.getElementById("map_canvas"),
			        myOptions);
			 
			    // Creating a marker and positioning it on the map  
			    var marker = new google.maps.Marker({  
			      position: new google.maps.LatLng(<?php echo $latitudine ?>, <?php echo $longitudine ?>),  
			      map: map  
			    });
			 
			 
			  }

		    // Asynchronously Load the map API 
		    var script = document.createElement('script');
		    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
		    document.body.appendChild(script);

			</script>
			<div id="map_wrapper">
			    <div id="map_canvas" class="mapping"></div>
			</div>

		<?php
			}
		?>


		<!-- galleria immagini -->
				<?php if( have_rows('galleria') ): ?>
					<ul class="slides">
					<?php while( have_rows('galleria') ): the_row(); 
						// vars
						$image = get_sub_field('immagine');
						$title_img = $image['title'];
						$large = $image['sizes']['large'];
					?>
						<li>
							<?php if( $image ): ?>
								<img src="<?php echo $large; ?>" alt="<?php echo $title_img; ?>" />
							<?php endif; ?>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?> <!-- end galleria immagini -->




	<?php endwhile; else: ?>

		<!-- Codice da eseguire in caso di contenuto non trovato -->


	<?php endif; ?>


<?php get_footer(); ?>