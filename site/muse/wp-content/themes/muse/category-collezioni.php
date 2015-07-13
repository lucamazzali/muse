<?php get_header(); ?>

	<section>



		<?php 
		$this_cat = get_query_var('cat');
    $args = array(
      'orderby' => 'id',
      'hide_empty'=> 0,
      'child_of' => $this_cat, //Child From Boxes Category 
  );
  $categories = get_categories($args);
  foreach ($categories as $cat) {
        echo '<div style="width:20%;float:left;display:none;">';
        echo '<h1 class="valignmiddle uppercase title-bold">'.$cat->name.'<img src="'.$cat->term_icon.'" alt=""  class="alignleft"/>'.'<br />'.'<span class="solutions">'.$cat->description.'</span>'.'</h1>';
        echo '<br />';
        $args2= array("orderby"=>'name', "category" => $cat->cat_ID, 'post_type' => 'prodotto'); // Get Post from each Sub-Category
        $posts_in_category = get_posts($args2);
        foreach($posts_in_category as $current_post) {
            echo '<span>';
            ?>
            <li type='none' style='list-style-type: none !important;'><a href="<?=$current_post->guid;?>"><?='+ '.$current_post->post_title;?></a></li>
            <?php
            echo '</span>';
        }
        echo '</div>';
    }
?>

		<ul>
		<?php	
			$categories =  get_categories('child_of=4');
			//print_r($categories);
			foreach  ($categories as $category) {
			    //Display the sub category information using $category values like $category->cat_name
			    echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="'.$category->name.'">'.$category->name.'</a></li>';
			}
		?>
		</ul>

		
    	
  </section><!-- end row -->

<?php get_footer(); ?>