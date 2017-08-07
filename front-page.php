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
    <h1>Explore opportunities RVA has to offer
    <br>
    <br>
    <span class="glyphicon glyphicon-chevron-down header-icon"></span>
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

			</div>

			</div>
		</div>
		<hr>
    	<div class="row">
    		<div class="col-lg-12">
    			<h2>Pulse Line Interactive</h2>
    			<p>Make some room here for some primer text....</p>
    			<p>Something else </p>
    			<p class="pull-right">Legend Text or Tooltip</p>
    			<img src="<?php echo get_template_directory_uri() . '/img/pulse-line3.svg'; ?>" width="100%" height="100%">

<br>
<br>
    			<br>
    			<br>
    		</div>
    		
    	</div>
    </div>

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
