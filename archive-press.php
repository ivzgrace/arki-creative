<?php
/**
 * The press template file.
 *
 * Template Name: Media
 * 
 * @package Luisa
 * @since Luisa 1.0
 */
 
get_header(); ?>


<section class="container press-media">
<div class="col-md-12">

      <?php 
        $pagec = get_post(12); 
          $content = apply_filters('the_content', $pagec->post_content); 
          echo $content; 
       ?>
   </div>
  <div class="col-md-12 clearfix">
	
    <?php 
      $args = array(
              'post_type' => 'press',
              'orderby' => 'post_date',
              'order'   => 'DESC',
              'posts_per_page' => 15,
              'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
      );

        query_posts($args);
		
    ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="col-md-4 col-sm-6 col-xs-6 press-thumb">
            <a href="<?php the_permalink(); ?>">
              <?php 
              if ( has_post_thumbnail()):
                the_post_thumbnail('press-thumb', array( 'class' => "img-responsive")); 
              endif;
              ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="pubdate"><?php echo rwmb_meta( 'rw_datepub' ); ?></span>
      </div>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
   </div>
   
	
</section>

<?php get_footer(); ?>