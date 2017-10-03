<?php
/** 
* The Header for our theme. 
* Displays all of the <head> section 
* 
*/?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php wp_title( '|', true, 'right' ); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <?php wp_head(); ?>
   <script>
var $ = jQuery.noConflict();

</script>
</head>

<body <?php body_class(); ?> >
<header class="header" role="banner">
    <a class="mobile-logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2017/02/logo.png" alt="Arki Creative Design"></a>
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
