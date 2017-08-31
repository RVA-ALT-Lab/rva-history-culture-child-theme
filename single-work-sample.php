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

<div class="jumbotron header-img" style="background-image: linear-gradient(
      rgba(0, 0, 0, 0.45), 
      rgba(0, 0, 0, 0.45)
    ), url(<?php echo get_the_post_thumbnail_url(); ?>);">

<div class="header-text">
	<h1><?php the_title(); ?></h1>
	<p><?php the_terms(get_the_ID(), 'work-sample-tags', 'Tagged with ', ', '); ?></p>
</div>
	
</div>



<div class="wrapper" id="wrapper-index">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<div class="col-lg-2">
			
			</div>
			<div class="col-lg-8">

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php $main_title = get_the_title();  ?>

					<?php while ( have_posts() ) : the_post(); ?>

					<div class="content-section">
						<?php the_content(); ?>
					</div>

					<a href="<?php echo get_post_meta($post->ID, 'url', true); ?>" class="btn btn-secondary btn-block"><i class="fa fa-mouse-pointer"></i> &nbsp;Click Here to View the Project</a>
					<br>
					<br>

					<div class="content-section">
						<h3>Faculty Members</h3>
						<?php echo get_post_meta($post->ID, 'faculty_', true); ?>
					</div>
				<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>	
					<div class="content-section">
					<h3>Related Projects</h3>
					<div class="card-deck">
						<?php 
						$terms = get_the_terms(get_the_ID(), 'work-sample-tags');  
						$terms_array = array(); 
						foreach($terms as $term){

							array_push($terms_array, $term->term_id); 
						}

						$args = array(
							'post_type' => 'work-sample',
							'post__not_in' => array(get_the_ID()),  
							'tax_query' => array(
								array(
									'taxonomy' => 'work-sample-tags', 
									'field' => 'term_id', 
									'terms' => $terms_array, 
									), 
								), 
							); 
						$wp_query = new WP_Query($args);
						?> 

						<?php if ( $wp_query->have_posts() ) : ?>

						<!-- pagination here -->

						<!-- the loop -->
						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div class="card text-center">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top">
								<div class="card-block">
									<h4 class="card-title"><?php the_title(); ?></h4>
									
									<p><?php the_terms(get_the_ID(), 'work-sample-tags', 'Tagged with ', ', '); ?></p>

									<a href="<?php the_permalink(); ?>" class="btn btn-secondary"> Read More</a>
								</div>
							</div>
							<!-- TODO: Come up with some formatting here for faculty student -->

						<?php endwhile; ?>
						<!-- end of the loop -->

						<!-- pagination here -->

						<?php wp_reset_postdata(); ?>

						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria. Inside WP loop...' ); ?></p>
						<?php endif; ?>
					</div><!-- End Card Deck -->





					</div>

			</main><!-- #main -->

		</div><!-- #primary -->
		<div class="col-lg-2">
			
		</div>


	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
