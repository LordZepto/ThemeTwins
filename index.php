<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

	<div id="primary" class="site-content">
		<div id="content" role="main">
		    <div id="posts_wrapper" class="container_8">
				<div class="clear"></div>
				<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						    <div class="post_image">
						        <?php the_post_thumbnail(array('260', '195')); ?>
						    </div>
						    <div class="post_content">
						        <h1 class="entry-title">
						            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'themetwins' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						        </h1>
						        <div class="post_content_text">
						            <div class="entry-summary">
						                <?php the_excerpt(); ?>
						            </div><!-- .entry-summary -->
						        </div>
						    </div>
						    <div class="clear"></div>
						    <div class="post_info">
						        <ul>
						            <li class="post_author">Por <strong><?php the_author(); ?></strong></li>
						            <li class="post_date"> | <?php the_time('j/m/Y'); ?></li>
						            <li class="post_comments_count"> | <?php comments_popup_link( '<span class="leave-reply">' . 'Deja un comentario' . '</span>', '1 Comentario', '% Comentarios'); ?></li>
						        </ul>
						        <div class="post_read_more">
						            <a href="<?php the_permalink(); ?>" title="Leer Mas" rel="bookmark">Leer Mas ></a>
						        </div>
						    </div>
						</article>
						<div class="clear"></div>
					<?php endwhile; ?>
				<?php else : ?>
					<article id="post-0" class="post no-results not-found">
						<?php if ( current_user_can( 'edit_posts' ) ) :
						// Show a different message to a logged-in user who can add posts.
						?>
					    	<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'No posts to display', 'themetwins' ); ?></h1>
							</header>

							<div class="entry-content">
								<p>
									<?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'themetwins' ), admin_url( 'post-new.php' ) ); ?>
								</p>
							</div><!-- .entry-content -->

						<?php else :
						// Show the default message to everyone else.
						?>
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'themetwins' ); ?></h1>
							</header>

							<div class="entry-content">
								<p>
									<?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'themetwins' ); ?>
								</p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						<?php endif; // end current_user_can() check ?>

					</article><!-- #post-0 -->

				<?php endif; // end have_posts() check ?>
				
		    </div>

		</div><!-- #content -->
		
		
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php themetwins_content_nav( 'nav-below' ); ?>
	<?php get_footer(); ?>