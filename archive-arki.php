<?php
/**
 * The press template file.
 *
 * Template Name: Arki on TV
 * 
 * @package Luisa
 * @since Luisa 1.0
 */
 
get_header(); ?>


<section class="container arki-media">
<div class="row">
  <div class="col-md-7 clearfix">
	
    <?php 
      $args = array(
              'post_type' => 'episode',
              'orderby' => 'post_date',
              'order'   => 'DESC',
              'posts_per_page' => 15,
              'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
      );

        query_posts($args);
		
    ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="picholder">
            <a href="<?php the_permalink(); ?>">
              <?php 
              if ( has_post_thumbnail()):
                the_post_thumbnail('arki-thumb', array( 'class' => "img-responsive")); 
              endif;
              ?></a>
              <div class="overlay"><a class="text_box" href="<?php the_permalink(); ?>"><?php the_content(); ?></a></div>
        </div>
      </div>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
   </div>
  <div class="col-md-5">
    <div class="videofeed">
      <img src="http://www.arkicreative.com.au/wp-content/uploads/2017/09/video.jpg" alt="arki creative"  width="100%"/>
    </div>
    <div class="insta-feed">  
      <?php dynamic_sidebar( 'sidebar-arkitv' ); ?>
    </div>
  
  </div>
</div>
</section>
<section class="container arki-contentb">
<div class="col-md-12">

      <?php 
        $pagec = get_post(549); 
          $content = apply_filters('the_content', $pagec->post_content); 
          echo $content; 
       ?>
   </div>

<?php get_footer(); ?>