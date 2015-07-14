<?php

/**
 * Plugin Name: Mio new post for category
 * Description: Aggiunge nella dashboard admin i link per gestire solo i post di determinate categorie e il sottomenu Add new per creare nuovi post già di una determinata categoria
 */

add_action('admin_menu', 'add_custom_menus');

function add_custom_menus(){ 
	add_menu_page( 'Fashion', 'Fashion', 'edit_posts', 'edit.php?category_name=fashion','','','5.6');
	add_submenu_page( 'edit.php?category_name=fashion', 'Add New Fashion', 'Add New Fashion', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=2');
	add_menu_page( 'Contents', 'Contents', 'edit_posts', 'edit.php?category_name=contents','','','5.7');
	add_submenu_page( 'edit.php?category_name=contents', 'Add New Contents', 'Add New Contents', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=3');
	add_menu_page( 'Portraits', 'Portraits', 'edit_posts', 'edit.php?category_name=portraits','','','5.8');
	add_submenu_page( 'edit.php?category_name=portraits', 'Add New Portraits', 'Add New Portraits', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=4');
	add_menu_page( 'Travel', 'Travel', 'edit_posts', 'edit.php?category_name=travel','','','5.9');
	add_submenu_page( 'edit.php?category_name=travel', 'Add New Travel', 'Add New Travel', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=5');
	add_menu_page( 'Art', 'Art', 'edit_posts', 'edit.php?category_name=art','','','5.10');
	add_submenu_page( 'edit.php?category_name=art', 'Add New Art', 'Add New Art', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=6');
	add_menu_page( 'Watch', 'Watch', 'edit_posts', 'edit.php?category_name=watch','','','5.11');
	add_submenu_page( 'edit.php?category_name=watch', 'Add New Watch', 'Add New Watch', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=7');
	add_menu_page( 'Magazine', 'Magazine', 'edit_posts', 'edit.php?category_name=magazine','','','5.12');
	add_submenu_page( 'edit.php?category_name=magazine', 'Add New Magazine', 'Add New Magazine', 'edit_posts', '../wp-content/plugins/mio-new-post-for-category/new-post-category.php?cat=8');
}


?>