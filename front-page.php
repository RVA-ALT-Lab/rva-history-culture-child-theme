<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero', 'none' ); ?>
<?php endif; ?>
<div class="video-wrapper">
    <h1>Context Matters - An Orientation to RVA
    <br>
    <br>
    <i class="fa fa-chevron-down"></i>
    </h1>
    	<video autoplay="" loop="" muted="" preload="">
    		<source src="https://rampages.us/rva-culture/wp-content/uploads/sites/24118/2017/04/Richmond-VA-from-above-RVA.mp4" type="video/mp4">
    	</video>
</div>

<div class="wrapper" id="wrapper-index">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">


			<main class="site-main" id="main">

			</main><!-- #main -->



	</div><!-- .row -->
	<div class="row">
    	<div class="col-lg-12">
    		<br>
    		<p class="lead">This website seeks to orient the higher education community to the history and culture of Richmond, Virginia (RVA) as a first step to rich engagement.</p>
    		<br>
			<h2>Focus Areas</h2>
            <p></p>
			<div class="row">
			

			<?php 
			$args = array('post_type' => 'content-area'); 
			$wp_query = new WP_Query($args); 
			?>


			<?php while($wp_query->have_posts()): ?>

				<?php $wp_query->the_post(); ?>
				<div class="col-lg-4 section-tile">
                <!-- Todo: implement the rest of the tiles with a link surrounding the .panel.panel-default 1 -->
                <a href="<?php the_permalink(); ?>">
					<div class="panel panel-default" style="background:url(<?php echo the_post_thumbnail_url(); ?>); background-size:cover;">
						<div class="panel-body">
							<div class="panel-transparency">
								<h2><?php echo get_the_title(); ?></h2>
								<div class="tile-text"><?php echo the_field('zinger_'); ?></div>
							</div>
						</div>		
					</div>
                 </a>   			
				</div>
			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

			</div>
			<br>
			<br>
			<p class="lead text-center">
				This site is not exhaustive. Suggestions and additions are welcomed. Send to <a href="mailto:engage@vcu.edu">engage@vcu.edu</a>.
			</p>

			</div>
		</div>
<!-- 		<hr>
    	<div class="row">
    		<div class="col-lg-12">
    			<h2>Pulse Bus Line (GRTC) </h2>
    			<p>The Pulse bus line, which is scheduled for completion in June 2018, will act as a spine through the Richmond metro area, connecting Richmond's early beginnings at Rockett's Landing with the West End at Willow Lawn. You can <a href="http://ridegrtc.com/brt/brt-now">learn more about the Pulse Line here</a></p>
    			<img src="<?php echo get_stylesheet_directory_uri() . '/img/pulse-line3.svg'; ?>" width="100%" height="100%">

<br>
<br>
    			<br>
    			<br>
    		</div>
    		
    	</div> -->
    	<!-- <div class="row">
    		<div class="col-lg-12">
    			<h2>Community Engaged Teaching</h2>
    			<p>Here are a few examples of the community engaged teaching being done by faculty from around the RVA area.</p>
    			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner" role="listbox">
				    
				  	<?php 
						$work_sample_args = array('post_type' => 'work-sample'); 
						$work_sample_wp_query = new WP_Query($work_sample_args); 
						$first_post = false; 
					?>


					<?php while($work_sample_wp_query->have_posts()): ?>

						<?php $work_sample_wp_query->the_post(); ?>
						<div class="carousel-item">
		                Todo: implement the rest of the tiles with a link surrounding the .panel.panel-default 1
		                <img class="d-block img-fluid" src="<?php echo the_post_thumbnail_url(); ?>" alt="First slide">   			
						</div>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>
				  



				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>


    			
    		</div>
    		
    	</div> -->
    
	<p class="text-center">Drone footage by <a href="http://www.creativedogmedia.com/">Creative Dog Media</a></p>
    </div>

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
