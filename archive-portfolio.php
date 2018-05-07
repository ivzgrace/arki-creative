<?php
/**
 * The portfolio template file.
 *
 * Template Name: Portfolio
 * 
 * @package Luisa
 * @since Luisa 1.0
 */
 
get_header(); ?>


<section class="container portfolio">
  <div class="col-lg-12">

    <?php 
      $args = array(
              'post_type' => 'portfolios',
              'orderby' => 'title',
              'order'   => 'ASC',
              'posts_per_page' => 15,
              'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
      );

        query_posts($args);
    ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="col-md-4 col-sm-6 col-xs-6">
            <a href="<?php the_permalink() ?>">
              <?php 
              if ( has_post_thumbnail()):
                the_post_thumbnail('portfolio-thumb', array( 'class' => "img-responsive img-portfolio img-hover")); 
              endif;
              ?></a>
                <h3><?php the_title(); ?></h3>
      </div>
    <?php endwhile;?>


	
</section>

<?php get_footer(); ?>