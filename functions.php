<?php
/**
 * Twenty Twelve functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_sliderindex_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'themetwins' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'themetwins', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'themetwins' ) );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	/** This theme has some options, for now all here for debugging purposes **/
	delete_option('theme_twins_options'); // debugging purposes, delete on the end.
	$themetwins_options = array(
			'scroller_number_of_posts' 	=> '5',
			'scroller_transition_ms' 	=> '1000',
			'scroller_interval_ms'		=> '6000'
		);

	if(! get_option('theme_twins_options')) {
		add_option( 'theme_twins_options', $themetwins_options );
	}
	
}
add_action( 'after_setup_theme', 'themetwins_setup' );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'themetwins-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'themetwins-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'themetwins' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'themetwins' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			// 'family' => 'Open+Sans:400italic,700italic,400,700',
			'family' => 'Duru+Sans|Istok+Web:400,700,400italic,700italic',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'themetwins-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'themetwins-style', get_stylesheet_uri() );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'themetwins-ie', get_template_directory_uri() . '/css/ie.css', array( 'themetwins-style' ), '20121010' );
	$wp_styles->add_data( 'themetwins-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'themetwins_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function themetwins_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'themetwins' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'themetwins_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'themetwins_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'themetwins' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'themetwins' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s grid_4">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="clear"></div>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'themetwins' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'themetwins' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'themetwins' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'themetwins' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'themetwins_widgets_init' );

if ( ! function_exists( 'themetwins_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );
	// <div id="pagination" class="container_12">
	// 	<a href="#" class="page prev">< Previous</a>
	// 	<a href="#" class="page">2</a>
	// 	<a href="#" class="page">3</a>
	// 	<span class="page selected">4</span>
	// 	<a href="#" class="page">5</a>
	// 	<a href="#" class="page">6</a>
	// 	<a href="#" class="page next">Next ></a>
	// </div>







	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<!-- <h3 class="assistive-text"><?php _e( 'Post navigation', 'themetwins' ); ?></h3> -->
			<div class="nav-previous page prev alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themetwins' ) ); ?></div>
			<div class="nav-next alignright page next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themetwins' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'themetwins_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own themetwins_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'themetwins' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'themetwins' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'themetwins' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'themetwins' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'themetwins' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'themetwins' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'themetwins' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'themetwins_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own themetwins_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'themetwins' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'themetwins' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'themetwins' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'themetwins' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'themetwins' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'themetwins' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function themetwins_body_class( $classes ) {
	$background_color = get_background_color();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'themetwins-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'themetwins_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'themetwins_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function themetwins_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'themetwins_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function themetwins_customize_preview_js() {
	wp_enqueue_script( 'themetwins-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'themetwins_customize_preview_js' );




/**
 * SLIDER INDEX IMAGE UPLOADER.
 */

add_action('add_meta_boxes', 'add_metabox_modal');
add_action('save_post', 'action_save_post');
// add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');
add_action('delete_attachment', 'action_delete_attachment');

/**
 * Add admin metabox for thumbnail chooser
 *
 * @return void
 */
function add_metabox() {
	add_meta_box("post-sliderindex", "Imágen de índice", 'thumbnail_meta_box', "post", 'side', "low");
}

/**
 * Add admin metabox for media modal chooser
 *  
 */
function add_metabox_modal() {
	add_meta_box("post-sliderindex", "Imágen de índice", 'thumbnail_meta_box_modal', "post", 'side', "low");
}

/**
 * Output the metabox with the media modal chooser
 * 
 * @global type $_wp_additional_image_sizes
 * @param type $post 
 */
function thumbnail_meta_box_modal($post) {
	global $_wp_additional_image_sizes;

    ?><style>
        #select-mpt-post-sliderindex {overflow: hidden; padding: 4px 0;}
        #select-mpt-post-sliderindex .remove {display: none; margin-top: 10px; }
        #select-mpt-post-sliderindex.has-featured-image .remove { display: inline-block; }
        #select-mpt-post-sliderindex a { clear: both; float: left; }
    </style>
    <script type="text/javascript">
    jQuery( function($) {
        var $element     = $('#select-mpt-post-sliderindex'),
            $thumbnailId = $element.find('input[name="post-sliderindex-thumbnail_id"]'),
            title        = 'Elige una imágen de índice',
            update       = 'Actualiza la imágen de índice',
            Attachment   = wp.media.model.Attachment,
            frame, setMPTImage;

        setMPTImage = function( thumbnailId ) {
            var selection;
            
            $element.find('img').remove();
            $element.toggleClass( 'has-featured-image', -1 != thumbnailId );
            $thumbnailId.val( thumbnailId );
            
            if ( frame ) {
                selection = frame.state().get('selection');
                if ( -1 === thumbnailId )
                    selection.clear();
                else
                    selection.add( Attachment.get( thumbnailId ) );
            }
        };

        $element.on( 'click', '.choose, img', function( event ) {
            event.preventDefault();

           if ( frame ) {
                frame.open();
                return;
            }
            
            options = {
                title:   title,
                library: {
                    type: 'image'
                }
            };
            
            thumbnailId = $thumbnailId.val();
            if ( '' !== thumbnailId && -1 !== thumbnailId )
                options.selection = [ Attachment.get( thumbnailId ) ];

            frame = wp.media.frames.frame = wp.media( options );
            frame.on( 'select', function() {
            	var selection = frame.state().get('selection'),
                    model = selection.first(),
                    sizes = model.attributes.sizes,
                    size;
                setMPTImage( model.id );

                // @todo: might need a size hierarchy equivalent.
                if ( sizes )
                    size = sizes['<?php echo esc_js("post-sliderindex-thumbnail"); ?>'] || sizes.medium;
                    //size = sizes['post-thumbnail'] || sizes.medium;

                // @todo: Need a better way of accessing full size
                // data besides just calling toJSON().
                size = size || model.toJSON();

                frame.close();

                $( '<img />', {
                    src:    size.url,
                    width:  size.width
                }).prependTo( $element );
                        

            });                    
        frame.open();        

        });


        $element.on( 'click', '.remove', function( event ) {
            event.preventDefault();
            setMPTImage( -1 );
        });
    });
    </script>

    <?php
    $thumbnail_id   = get_post_sliderindex_id("post", "sliderindex", $post->ID);
    $thumbnail_size = isset( $_wp_additional_image_sizes["post-sliderindex-thumbnail"] ) ? "post-sliderindex-thumbnail" : 'medium';
    $thumbnail_html = wp_get_attachment_image( $thumbnail_id, $thumbnail_size );

    $classes = empty( $thumbnail_id ) ? '' : 'has-featured-image';

    ?><div id="select-mpt-post-sliderindex"
        class="<?php echo esc_attr( $classes ); ?>"
        data-post-id="<?php echo esc_attr( $post->ID ); ?>">
        <?php echo $thumbnail_html; ?>
        <input type="hidden" name="post-sliderindex-thumbnail_id" value="<?php echo esc_attr( $thumbnail_id ); ?>" />
        <a href="#" class="choose button-secondary">Elige una imágen de índice</a>
        <a href="#" class="remove">Elimina la imágen de índice</a>
    </div>
    <?php
}

/**
 * Save or remove the thumbnail metadata. Only for WordPress version >=3.5 with modal media chooser.
 * @param type $post_id 
 */
function action_save_post($post_id) {
    if (! is_admin() || ! isset($_POST["post-sliderindex-thumbnail_id"])) {
        return;
    }
    
    if (! empty($_POST["post-sliderindex-thumbnail_id"])) {
        $thumbnail_id = (int) $_POST["post-sliderindex-thumbnail_id"];
        if ('-1' == $thumbnail_id)
            delete_post_meta($post_id, "post_sliderindex_thumbnail_id");
        else
            update_post_meta($post_id, "post_sliderindex_thumbnail_id", $thumbnail_id);
    } else {
        delete_post_meta($post_id, "post_sliderindex_thumbnail_id");
    }
}

/**
 * Output the thumbnail meta box
 *
 * @return string HTML output
 */
function thumbnail_meta_box() {
	global $post;
	$thumbnail_id = get_post_meta($post->ID, "post_sliderindex_thumbnail_id", true);
	echo post_thumbnail_html($thumbnail_id);
}

/**
 * Throw this in the media attachment fields
 *
 * @param string $form_fields
 * @param string $post
 * @return void
 */
function add_attachment_field($form_fields, $post) {
	$calling_post_id = 0;
	if (isset($_GET['post_id']))
		$calling_post_id = absint($_GET['post_id']);
	elseif (isset($_POST) && count($_POST)) // Like for async-upload where $_GET['post_id'] isn't set
		$calling_post_id = $post->post_parent;

	if (!$calling_post_id)
		return $form_fields;

	// check the post type to see if link needs to be added
	$calling_post = get_post($calling_post_id);
	if (is_null($calling_post) || $calling_post->post_type != "post") {
		return $form_fields;
	}

	$referer = wp_get_referer();
	$query_vars = wp_parse_args(parse_url($referer, PHP_URL_QUERY));

	if( (isset($_REQUEST['context']) && $_REQUEST['context'] != "sliderindex") || (isset($query_vars['context']) && $query_vars['context'] != "sliderindex") )
		return $form_fields;

	$ajax_nonce = wp_create_nonce("set_post_sliderindex-post-sliderindex-{$calling_post_id}");
	$link = sprintf('<a id="%4$s-%1$s-thumbnail-%2$s" class="%1$s-thumbnail" href="#" onclick="MultiPostThumbnails.setAsThumbnail(\'%2$s\', \'%1$s\', \'%4$s\', \'%5$s\');return false;">Set as %3$s</a>', "sliderindex", $post->ID, "sliderindex", "post", $ajax_nonce);
	$form_fields["post-sliderindex-thumbnail"] = array(
		'label' => "sliderindex",
		'input' => 'html',
		'html' => $link);
	return $form_fields;
}

/**
 * Enqueue admin JavaScripts
 *
 * @return void
 */
function enqueue_admin_scripts( $hook ) {
	// only load on select pages
	if ( ! in_array( $hook, array( 'post-new.php', 'post.php', 'media-upload-popup' ) ) )
		return;

	add_thickbox();
	wp_enqueue_script( "featured-image-custom", get_template_directory_uri() . '/js/index-image.js', array( 'jquery', 'media-upload' ) );
}

/**
 * Deletes the post meta data for posts when an attachment used as a
 * multiple post thumbnail is deleted from the Media Libray
 *
 * @global object $wpdb
 * @param int $post_id
 */
function action_delete_attachment($post_id) {
	global $wpdb;
    
	$wpdb->query( $wpdb->prepare( "DELETE FROM $wpdb->postmeta WHERE meta_key = '%s' AND meta_value = %d", "post_sliderindex_thumbnail_id", $post_id ));
}

/**
 * Check if post has an image attached.
 *
 * @param string $post_type The post type.
 * @param string $id The id used to register the thumbnail.
 * @param string $post_id Optional. Post ID.
 * @return bool Whether post has an image attached.
 */
function has_post_sliderindex($post_type, $id, $post_id = null) {
	if (null === $post_id) {
		$post_id = get_the_ID();
	}

	if (!$post_id) {
		return false;
	}

	return get_post_meta($post_id, "post_sliderindex_thumbnail_id", true);
}

/**
 * Display Post Thumbnail.
 *
 * @param string $post_type The post type.
 * @param string $thumb_id The id used to register the thumbnail.
 * @param string $post_id Optional. Post ID.
 * @param int $size Optional. Image size.  Defaults to 'post-thumbnail', which theme sets using set_post_sliderindex_size( $width, $height, $crop_flag );.
 * @param string|array $attr Optional. Query string or array of attributes.
 * @param bool $link_to_original Optional. Wrap link to original image around thumbnail?
 */
function the_post_sliderindex($post_type, $thumb_id, $post_id = null, $size = 'post-thumbnail', $attr = '', $link_to_original = false) {
	echo get_the_post_sliderindex($post_type, $thumb_id, $post_id, $size, $attr, $link_to_original);
}

/**
 * Retrieve Post Thumbnail.
 *
 * @param string $post_type The post type.
 * @param string $thumb_id The id used to register the thumbnail.
 * @param int $post_id Optional. Post ID.
 * @param string $size Optional. Image size.  Defaults to 'thumbnail'.
 * @param bool $link_to_original Optional. Wrap link to original image around thumbnail?
 * @param string|array $attr Optional. Query string or array of attributes.
  */
function get_the_post_sliderindex($post_type, $thumb_id, $post_id = NULL, $size = 'post-thumbnail', $attr = '' , $link_to_original = false) {
	global $id;
	$post_id = (NULL === $post_id) ? get_the_ID() : $post_id;
	$post_thumbnail_id = get_post_sliderindex_id($post_type, $thumb_id, $post_id);
	$size = apply_filters("{$post_type}_{$post_id}_thumbnail_size", $size);
	if ($post_thumbnail_id) {
		do_action("begin_fetch_multi_{$post_type}_thumbnail_html", $post_id, $post_thumbnail_id, $size); // for "Just In Time" filtering of all of wp_get_attachment_image()'s filters
		$html = wp_get_attachment_image( $post_thumbnail_id, $size, false, $attr );
		do_action("end_fetch_multi_{$post_type}_thumbnail_html", $post_id, $post_thumbnail_id, $size);
	} else {
		$html = '';
	}

	if ($link_to_original && $html) {
		$html = sprintf('<a href="%s">%s</a>', wp_get_attachment_url($post_thumbnail_id), $html);
	}

	return apply_filters("{$post_type}_{$thumb_id}_thumbnail_html", $html, $post_id, $post_thumbnail_id, $size, $attr);
}

/**
 * Retrieve Post Thumbnail ID.
 *
 * @param string $post_type The post type.
 * @param string $id The id used to register the thumbnail.
 * @param int $post_id Post ID.
 * @return int
 */
function get_post_sliderindex_id($post_type, $id, $post_id) {
	return get_post_meta($post_id, "{$post_type}_{$id}_thumbnail_id", true);
}

/**
 *
 * @param string $post_type The post type.
 * @param string $id The id used to register the thumbnail.
 * @param int $post_id Optional. The post ID. If not set, will attempt to get it.
 * @return mixed Thumbnail url or false if the post doesn't have a thumbnail for the given post type, and id.
 */
function get_post_sliderindex_url($post_type, $id, $post_id = 0) {
	if (!$post_id) {
		$post_id = get_the_ID();
	}

	$post_thumbnail_id = get_post_sliderindex_id($post_type, $id, $post_id);

	return wp_get_attachment_url($post_thumbnail_id);
}

/**
 * Output the post thumbnail HTML for the metabox and AJAX callbacks
 *
 * @param string $thumbnail_id The thumbnail's post ID.
 * @return string HTML
 */
function post_thumbnail_html($thumbnail_id = null) {
	global $content_width, $_wp_additional_image_sizes, $post_ID;
	$image_library_url = get_upload_iframe_src('image');
	 // if TB_iframe is not moved to end of query string, thickbox will remove all query args after it.
	$image_library_url = add_query_arg( array( 'context' => "sliderindex", 'TB_iframe' => 1 ), remove_query_arg( 'TB_iframe', $image_library_url ) );
	$set_thumbnail_link = sprintf('<p class="hide-if-no-js"><a title="Imágen de índice" href="%2$s" id="set-%3$s-%4$s-thumbnail" class="thickbox">%%s</a></p>', $image_library_url, "post", "sliderindex");
	$content = sprintf($set_thumbnail_link, esc_html__( "Establecer imágen de índice" ));


	if ($thumbnail_id && get_post($thumbnail_id)) {
		$old_content_width = $content_width;
		$content_width = 266;
		if ( !isset($_wp_additional_image_sizes["post-sliderindex-thumbnail"]))
			$thumbnail_html = wp_get_attachment_image($thumbnail_id, array($content_width, $content_width));
		else
			$thumbnail_html = wp_get_attachment_image($thumbnail_id, "post-sliderindex-thumbnail");
		if (!empty($thumbnail_html)) {
			$ajax_nonce = wp_create_nonce("set_post_sliderindex-post-sliderindex-{$post_ID}");
			$content = sprintf($set_thumbnail_link, $thumbnail_html);
			$content .= sprintf('<p class="hide-if-no-js"><a href="#" id="remove-%1$s-%2$s-thumbnail" onclick="MultiPostThumbnails.removeThumbnail(\'%2$s\', \'%1$s\', \'%4$s\');return false;">%3$s</a></p>', "post", "sliderindex", esc_html__( "Eliminar imágen de índice" ), $ajax_nonce);
		}
		$content_width = $old_content_width;
	}

	return $content;
}

/**
 * Set/remove the post thumbnail. AJAX handler.
 *
 * @return string Updated post thumbnail HTML.
 */
function set_thumbnail() {
	global $post_ID; // have to do this so get_upload_iframe_src() can grab it
	$post_ID = intval($_POST['post_id']);
	if ( !current_user_can('edit_post', $post_ID))
		die('-1');
	$thumbnail_id = intval($_POST['thumbnail_id']);

	check_ajax_referer("set_post_sliderindex-post-sliderindex-{$post_ID}");

	if ($thumbnail_id == '-1') {
		delete_post_meta($post_ID, "post_sliderindex_thumbnail_id");
		die(post_thumbnail_html(null));
	}

	if ($thumbnail_id && get_post($thumbnail_id)) {
		$thumbnail_html = wp_get_attachment_image($thumbnail_id, 'thumbnail');
		if (!empty($thumbnail_html)) {
			update_post_meta($post_ID, "post_sliderindex_thumbnail_id", $thumbnail_id);
			die(post_thumbnail_html($thumbnail_id));
		}
	}

	die('0');
}
