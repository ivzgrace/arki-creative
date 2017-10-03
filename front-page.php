<?php
/**
 * The home template file.
 *
 * This is the home template file
 * Template Name: Home
 * @package Luisa
 * @since Luisa 1.0
 */
 ?>
 <!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php wp_title( '|', true, 'right' ); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <?php wp_head(); ?>
   <script>
var $ = jQuery.noConflict();
$(document).ready(function(){
  $('.homeheader .mainlogo img').css("visibility", "hidden");
  $('.homeheader .mobile-logo img').css("visibility", "hidden");

  $('#logoslide').fadeOut(7000,function(){
      //$(this).slideUp('slow');
      $('.homeheader .mainlogo img').css("visibility", "visible");
        if ($(window).width() <= 992) {
          $('.homeheader .mobile-logo img').css("visibility", "visible");
        }
      });
 });




</script>

</head>
<header class="homeheader" role="banner">
    <a class="mobile-logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2017/02/logo.png" alt=""></a>
<nav id="navbar-primary" class="navbar" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
      <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav navbar-nav',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbar-primary-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker()
             ) );
        ?>

  </div><!-- /.container-fluid -->
</nav>
</header><!-- header role="banner" -->
<body <?php body_class(); ?>>
    


<section class="container arki-home">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="slider"><?php the_content(); ?></div>

    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?> 

</section>

<?php get_footer(); ?>