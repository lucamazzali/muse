			
			
			<footer class="footer clearfix">
                <?php get_template_part( 'page-template/footer', 'footer' ); ?>
                <!-- include(locate_template('custom-template-part.php')); -->
                <?php
                if ( is_page('contacts')) {
                ?>
                ddd
                <?php
                    } 
                ?>
                <?php // Area widget sotto l'header, dove richiamiamo l'id 
                    if ( is_active_sidebar( 'sotto-footer' ) ) : ?>
                    <div id="widget-sidebar">
                        <ul>
                            <?php dynamic_sidebar( 'sotto-footer' ); ?>
                        </ul>
                    </div><!-- #widget-sidebar .widget-area -->
                <?php
                    endif; ?>
            </footer>

		</div><!-- end container -->
		
		<!-- script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script -->
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor//jquery.turbolinks.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

        <?php wp_footer(); ?>
         
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-59877053-1', 'auto');
            ga('send', 'pageview');
        </script -->

	</body>

</html> <!-- end of site. what a ride! -->
