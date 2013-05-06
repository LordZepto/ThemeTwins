<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage ThemeTwins
 * @version 1.0
 * @date 18/02/013
 * @author LordZepto
 * @link http://lordzepto.net
 *
 */

get_header(); ?>
    	<div id="posts_wrapper">
	        <div id="posts" class="container_8">
				<div id="primary" class=" site-content">
					<div id="content" role="main" class="grid_8">
						<!-- page.php -->
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'page' ); ?>
							<?php comments_template( '', true ); ?>
						<?php endwhile; // end of the loop. ?>

					</div><!-- #content -->
				</div><!-- #primary -->
			</div><!-- #primary -->

		</div><!-- #primary -->	

<?php get_sidebar(); ?>
<div class="navigation"></div>
<?php get_footer(); ?>