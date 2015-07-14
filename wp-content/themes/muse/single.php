<?php get_header(); ?>


	<div class="row no-margin content">
		
		<!-- PAGE CONTENT -->
		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post();

			// CATEGERORY E SUB CATEGORY
			$post_categories = wp_get_post_categories( $post->ID );
			$cats = array();
				
			foreach($post_categories as $c){
				$cat = get_category( $c );
				$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
			}

		?>

			<!-- Codice da eseguire in caso di contenuto trovato -->
			
			<article class="col-md-12">
				<div class="col-md-6">
					<span class="category">
						<?php if ( isset($cats[0]) == true && $cats[0]['name'] != 'Collections' ) { echo $cats[0]['name']; } ?>
						<?php if ( isset($cats[1]) == true && $cats[1]['name'] != 'Collections' ) { ?> <?php echo $cats[1]['name']; } ?>
						<?php if ( isset($cats[1]) == true && isset($cats[2]) == true ) { ?>-<?php } ?>
						<?php if ( isset($cats[2]) == true && $cats[2]['name'] != 'Collections' ) { ?> <?php echo $cats[2]['name']; } ?>
					</span>
					<h1><?php the_title(); ?></h1>
					<?php
						if( get_field( "sottotitolo" ) ): ?>
							<h3><?php the_field("sottotitolo") ?></h3>
					<?php
						endif;
					?>
					<div class="content-text"><?php the_content(); ?></div>
				</div>

				
				<div class="col-md-6">

				<!-- DATE E LOCATION -->
					<?php
						if( get_field( "contatto_email" ) ): ?>
						<div class="box-mail-web">
							<a href="mailto:<?php the_field('contatto_email') ?>" title="email"><i class="fa fa-envelope-o"></i></a>
							<a href="<?php the_field('site') ?>" title="web-site" target="_blank"><i class="fa fa-globe"></i></a>
						</div>
					<?php
						endif;
					?>
					<?php if( have_rows('data_location') ): ?>
						<ul>

						<?php while( have_rows('data_location') ): the_row(); 

							// vars
							$inizio = get_sub_field('data_inizio');
							$fine = get_sub_field('data_fine');
							$location = get_sub_field('location');

							?>

							<li>
								<div class="row date">
									<div class="col-md-6 text-right">
										<span><?php echo date('j', strtotime($inizio)); ?></span>
										<?php echo date('M', strtotime($inizio)); ?><br/>
										<span><?php echo date('j', strtotime($fine ));?></span>
										<?php echo date('M', strtotime($fine ));?><br/>
										<span class="mounth"><?php echo date('Y', strtotime($fine)); ?></span>
									</div>
									<div class="col-md-6">
										<div class="location"><?php echo $location ?></div>
									</div>
								</div>
							</li>

						<?php endwhile; ?>

						</ul>
					<?php endif; ?>

					<!-- GALLERY -->
					<?php if( have_rows('gallery') ): ?>
					<div class="flexslider foto-brands">
						<ul class="slides">

						<?php while( have_rows('gallery') ): the_row(); 

							// vars
							$image = get_sub_field('immagine');
							$url = $image['url'];
							$title = $image['title'];
							$alt = $image['alt'];
							$caption = $image['caption'];

							$size = 'width_600';
							$urlImage = $image['sizes'][ $size ];
							$width = $image['sizes'][ $size . '-width' ];
							$height = $image['sizes'][ $size . '-height' ];

							?>

							<li class="slide">

								<figure><img src="<?php echo get_template_directory_uri(); ?>/img/t.png" data-src="<?php echo $urlImage ?>" alt="<?php the_title(); ?>" class="lazy" /></figure>

							</li>

						<?php endwhile; ?>

						</ul>
					</div>
					<?php endif; ?>

				</div>
				
			</article>

		<?php endwhile; else: ?>

			<!-- Codice da eseguire in caso di contenuto non trovato -->


		<?php endif; ?>


		
	</div>

<?php get_footer(); ?>