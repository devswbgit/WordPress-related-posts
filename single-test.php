<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			global $post;

			if ( 'test' == get_post_type() ){
				$select_data = get_field('select_data', $post->ID); //select_data - type field: "Post Object"
				if($select_data){
					$comma_select_data = implode(',', $select_data);
				}
			}

			$related_post = get_posts( array(
				'post_type'     => 'anothertypepost',
				'include'   => $comma_select_data,
				'post_status'   => 'publish',
				'posts_per_page'=> '-1',
				'meta_key'  => 'ratingnumber',
				'orderby'       => array(
					'meta_value_num' => 'DESC',
				)
			) );
			?>

			<?php the_content(); ?>
		</main>
	</div>

<?php get_footer(); ?>