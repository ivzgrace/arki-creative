<?php
/**
 * The single episode template file.
 * 
 * @package Luisa
 * @since Luisa 1.0
 */
 
get_header();  ?>

<section class="container single-episode">
	<div class="col-md-12">
		<?php if (have_posts()) : while (have_posts()) : the_post(); 

			$images = rwmb_meta( 'rw_epupload','size=large' ); // Since 4.8.0
			$images = rwmb_meta( 'rw_epupload', 'type=plupload_image&size=large' ); // Prior to 4.8.0
		?>
   		<div class="row">
		   <div class="col-md-12 sliderarea">
			   <?php /<div class="slider">
				   	<?php if ( !empty( $images ) ) { ?>
				   	<ul class="bxslider">
						<?php   
							
								foreach ( $images as $image ) {
									
									echo '<li><img class="img-responsive" src="', esc_url( $image['url'] ), '"  alt="', esc_attr( $image['alt'] ), '"></li>';
									
								}							
						?>
					</ul>
					<?php } ?>
				</div> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 portdesc">
				
				<div class="portfolio-content"><?php the_content(); ?></div>
				<h3 class="portfolio-title"><?php single_post_title(); ?></h3>
				<?php $go_back = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
				
		    </div>
		 </div>
			  <?php
			endwhile;
		else:
			?>
			<p>Sorry, no posts matched your criteria</p>
		<?php endif; ?>
	</div>
	<div class="col-md-12">
		<div class="goback"><a href="<?php echo $go_back; ?>">< GO BACK</a></div>
	</div>
  </section>

<?php get_footer(); ?>