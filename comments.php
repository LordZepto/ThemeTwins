<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to themetwins_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area grid_8">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title grid_8">
			<?php
				printf( _n( '1 Comentario', '%1$s Comentarios', get_comments_number(), 'themetwins' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h2>

		<ul class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'themetwins_comment', 'style' => 'ul' ) ); ?>
		</ul><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'themetwins' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'themetwins' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'themetwins' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'themetwins' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

</div><!-- #comments .comments-area -->

<?php
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
	        'author' => '<input id="author" name="author" type="text" placeholder="Nombre ' . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />',
	        'email'  => '<input id="email"  name="email"  type="text" placeholder="Email ' . ( $req ? '*' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />',
	        'url'    => '<input id="url"    name="url"    type="text" placeholder="Url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /><div class="clear"></div>',
	);
	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
	$defaults = array(
	        'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	        'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" rows="8" placeholder="Comentario ... *" aria-required="true"></textarea></p><div class="clear"></div>',
	        'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
	        'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
	        'id_form'              => 'commentform',
	        'id_submit'            => 'submit',
	        'title_reply'          => __( 'Leave a Reply' ),
	        'title_reply_to'       => __( 'Leave a Reply to %s' ),
	        'cancel_reply_link'    => __( 'Cancel reply' ),
	        'label_submit'         => __( 'Post Comment' ),
	);
	
	$args = apply_filters( 'comment_form_defaults', $defaults );
?>

<div class="comment-form grid_8">
	<?php comment_form($args); ?>
</div>