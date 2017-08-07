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

					<h2><?php the_title(); ?></h2>
					
					<div class="content-section">
						<?php the_content(); ?>
					</div>
					<div class="content-section navigation hidden-sm-down">
						<div class="card-deck">
									<div class="card">
									<a href="#learn-more">		
										<img src="https://elearningindustry.com/wp-content/uploads/2016/09/challenges-of-mobile-learning-corporate-training.jpeg" class="card-img-top">
										<div class="card-block">
											<p class="card-text">
												Learn More
											</p>
										</div>
									</a>	
									</div>
									<div class="card">
									<img src="https://elearningindustry.com/wp-content/uploads/2016/09/challenges-of-mobile-learning-corporate-training.jpeg" class="card-img-top">
										<div class="card-block">
											Get Involved
										</div>
									</div>
									<div class="card">
									<img src="https://elearningindustry.com/wp-content/uploads/2016/09/challenges-of-mobile-learning-corporate-training.jpeg" class="card-img-top">
										<div class="card-block">
											Test Your Knowledge
										</div>
									</div>	
									<div class="card">
									<img src="https://elearningindustry.com/wp-content/uploads/2016/09/challenges-of-mobile-learning-corporate-training.jpeg" class="card-img-top">
										<div class="card-block">
											Faculty & Student Engagement
										</div>
									</div>
						</div>
					</div>
				
				<div class="content-section">
					<h3>Learn More</h3><a name="learn-more"></a>

					<?php the_field('get_involved'); ?>
				</div>
				<div class="content-section">
					<h3>Get Involved</h3><a name="get-involved"></a>
					<?php the_field('get_involved'); ?>
				</div>
				<div class="content-section">
					<h3>Test Knowledge</h3><a name="test-knowledge"></a>
					<?php echo do_shortcode(the_field('quiz_shortcode_')); ?>
				</div>

				<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>
				<div class="content-section">
					<h3>Faculty and Student Involvement</h3><a name="work-samples"></a>
					<?php 
					$args = array(
						'post_type' => 'work-sample', 
						'tax_query' => array(
							array(
								'taxonomy' => 'content-area', 
								'field' => 'name', 
								'terms' => $main_title, 
								), 
							), 
						); 
					$wp_query = new WP_Query($args);
					?> 

					<?php if ( $wp_query->have_posts() ) : ?>

						<!-- pagination here -->

						<!-- the loop -->
						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<h4><?php the_title(); ?></h4>
							<!-- TODO: Come up with some formatting here for faculty student -->

						<?php endwhile; ?>
						<!-- end of the loop -->

						<!-- pagination here -->

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria. Inside WP loop...' ); ?></p>
					<?php endif; ?>
				</div>
			</main><!-- #main -->
			</div>
			<div class="col-lg-2">
				
			</div>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
