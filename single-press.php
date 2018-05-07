<?php
/**
 * The single media template file.
 * 
 * @package Luisa
 * @since Luisa 1.0
 */
 
get_header(); ?>


<div class="container single-press inner">
  <div class="col-lg-12">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		   <h1><?php single_post_title(); ?></h1>
		     

	 <?php
	 
		the_content();
	 
			endwhile;
		else:
			?>
			<p>Sorry, no posts matched your criteria</p>
		<?php endif; ?>
  </div>
  </div>

<?php get_footer(); ?>