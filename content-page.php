<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage ThemeTwins
 * @version 1.0
 * @date 18/02/013
 * @author LordZepto
 * @link http://lordzepto.net
 * 
 */
?>
	<!-- Content-page.php -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	        <?php the_post_thumbnail('single-post'); ?>
	    
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'themetwins' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'themetwins' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
