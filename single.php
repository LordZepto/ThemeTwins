<?php
/**
 * The Template for displaying all single posts.
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
<!-- single.php -->
    	<div id="posts_wrapper">
			<div id="primary" class="grid_8 site-content">
				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() ); ?>

						<nav class="nav-single">
							<!-- <h3 class="assistive-text"><?php //_e( 'Post navigation', 'themetwins' ); ?></h3> -->
							<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themetwins' ) . '</span> %title' ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themetwins' ) . '</span>' ); ?></span>
						</nav><!-- .nav-single -->

						<?php comments_template( '', true ); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content -->
			</div><!-- #primary -->


			
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>