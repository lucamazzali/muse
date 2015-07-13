<?php

require_once( dirname(dirname(__FILE__)) . '/../../wp-admin/admin.php' );

	$category = $_GET['cat']; // get the category from the url

	$post = array( // add a new post to the wordpress database
		'post_title'    => 'New',
		'post_status' => 'draft', // set post status to draft - we don't want the new post to appear live yet.
		'post_date' => date('Y-m-d H:i:s'), // set post date to current date.
		'post_author' => $user_ID, // set post author to current logged on user.
		'post_type' => 'post', // set post type to post.
		'post_category' => array($category) // set category to the category/categories parsed in your previous array
        );
	
	$post_id = wp_insert_post($post); // insert the post into the wp db
	//$post_details = get_post($insert_post); // get all the post details from new post
	//$post_id = $post_details->ID; // extract the post id from the post details
	$post_redirect = '../../../wp-admin/post.php?action=edit&post='.$post_id; // construct url for editing of post
	
	wp_redirect($post_redirect);// redirect to edit page for new post.
	exit;