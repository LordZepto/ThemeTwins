<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!-- </div> -->


        
            
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
                    <div class="post_read_more"><a href="<?php the_permalink(); ?>" title="Leer Mas" rel="bookmark">Leer Mas ></a></div>
                </div>
            </article>
            <div class="clear"></div>
