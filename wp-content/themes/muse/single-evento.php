<?php get_header(); ?>

	<?php 
		//query_posts( 'post_type=evento&orderby=desc&posts_per_page=-1' );
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
					$fiera = get_field('fiera');
					$padiglione = get_field('padiglione');
					$stand = get_field('stand');
				?>
				<ul>
					<?php if( $data ): ?><li>data inizio: <?php echo $data ?></li><?php endif; ?>
					<?php if( $datafineevento ): ?><li>data fine: <?php echo $datafineevento ?></li><?php endif; ?>
					<?php if( $localita ): ?><li>località: <?php echo $localita ?></li><?php endif; ?>
					<?php if( $fiera ): ?><li>fiera: <?php echo $fiera ?></li><?php endif; ?>
					<?php if( $padiglione ): ?><li>padiglione: <?php echo $padiglione ?></li><?php endif; ?>
					<?php if( $stand ): ?><li>stand: <?php echo $stand ?></li><?php endif; ?>		
				</ul>


				<!-- Mappa -->
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


			</article>
		</section>

	<?php endwhile; else: ?>

		<!-- Codice da eseguire in caso di contenuto non trovato -->


	<?php endif; ?>

<?php get_footer(); ?>