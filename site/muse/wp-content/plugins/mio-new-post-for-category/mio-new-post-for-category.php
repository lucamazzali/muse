<?php

/**
 * Plugin Name: Mio new post for category
 * Description: Aggiunge nella dashboard admin i link per creare nuovi post di una determinata categoria
 */

add_action('admin_menu', 'add_custom_menus');

function add_custom_menus(){ 
	add_menu_page( 'New Fashion', 'New Fashion', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=2','','','5.6');
	add_menu_page( 'New Content', 'New Content', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=3','','','5.7');
	add_menu_page( 'New Portrait', 'New Portrait', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=4','','','5.8');
	add_menu_page( 'New Travel', 'New Travel', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=5','','','5.9');
	add_menu_page( 'New Art', 'New Art', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=6','','','5.10');
	add_menu_page( 'New Watch', 'New Watch', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=7','','','5.11');
}

?>