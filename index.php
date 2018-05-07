<?php
/**
 * The main template file.
 *
 * This is the default template file in Luisa theme
 *
 * @package Luisa
 * @since Luisa 1.0
 */
 
get_header(); ?>

<div class="container inner">


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    	<?php the_content(); ?>

    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?> 

</div>

<?php get_footer(); ?>