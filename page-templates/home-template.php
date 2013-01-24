<?php
/**
 * Template Name: Home Template
 *
 * Description: A template for the home page, this has a slider of recent posts
 *
 * @package ThemeTwins
 * @since ThemeTwins 0.1
 * 
 */
$options = get_option('theme_twins_options');
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Istok+Web:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/home.css" >
</head>
<body>
	<div id="home_page" class="container">
		<div id="header">
			<div class="logo">NaizuStudio</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'Home', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<div class="timer"></div>
		</div>
		<div id="container">
			<div id="slideshow">
				<?php
	            $the_query = new WP_Query('showposts='. $options['scroller_number_of_posts'] . '&orderby=post_date&order=desc'); 
	            while ($the_query->have_posts()) : $the_query->the_post(); ?>
	               <?php the_post_thumbnail('full', array ('class' => 'scroll-bg', 'data-id' => get_the_ID())); ?>
	         			
	                  
	            <?php endwhile; ?>
	            <?php wp_reset_query(); ?>
	            <div id="slider_container">
		            <div id="slide_info">
		            	<?php
		            	$the_query = new WP_Query('showposts='. $options['scroller_number_of_posts'] . '&orderby=post_date&order=desc'); 
		            	while ($the_query->have_posts()) : $the_query->the_post();?>
		                	<div class="slide_text" data-id="<?php the_ID() ?>">
		                		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		                		<?php the_excerpt(); ?>
		                	</div>
		                                 
			            <?php endwhile; ?>
			            <?php wp_reset_query(); ?>
		            </div>
		            <div id="slider_index">
		            	<?php
		            	$the_query = new WP_Query('showposts='. $options['scroller_number_of_posts'] . '&orderby=post_date&order=desc'); 
		            	while ($the_query->have_posts()) : $the_query->the_post(); 
		            		?>
		                	<div class="slider_thumb" style="background-image: url('<?php echo get_post_sliderindex_url('post', 'sliderindex') ?>') ">
		                		
    						</div>
		                                 
			            <?php endwhile; ?>
			            <?php wp_reset_query(); ?>
		            </div>
	            </div>
            </div>
		</div>
		<div id="footer">
			<p>Copyright 2013 NaizuStudio |  All Rights Reserved   |   Powered by WordPress   |  ThemeTwins</p>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
	<script type="text/javascript">
		// TODO: Re-think the logic, is not that good....
			// 
		// function slideSwitch() {

		//     var $active = $('#slideshow IMG.active');

		//     if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

		//     var $next =  $active.next().length ? $active.next()
		//         : $('#slideshow IMG:first');

		//     $active.addClass('last-active');
		        
		//     $next.css({opacity: 0.0})
		//         .addClass('active')
		//         .animate({opacity: 1.0}, <?php echo $options['scroller_transition_ms'] ?>, function() {
		//             $active.removeClass('active last-active');
		//         });
		// }
		// $('.slider_thumb img').click(function() {
// $alt = $(this).attr('alt')
// $('#slideshow img).find([alt=$alt])

		// $(function() {
		// 	$('#slideshow').find(':first-child').addClass('active');
		//     setInterval( "slideSwitch()", <?php echo $options['scroller_interval_ms'] ?> );
		// });

		// function getCurrentWidth() {
		// 	var width = $('.timer').width();
		// 	var parentWidth = $('.timer').offsetParent().width();
		// 	var percent = 100*width/parentWidth;

		// 	return percent;
		// }

		// var timerStop = function () {
		//     if (!$("#slideshow > img")
		//         .is(":animated")) {
		//     }
		//     clearInterval(fadeBGInterval);
		// }

		// function progressEffect(milisecs, ele) {
		//     timer = setInterval(function () {
		//         $('.timer')
		//             .css({
		//             width: getCurrentWidth() + 1
		//         });
		//         if (isPBFinished()) {
		//             fadeBG();
		//         }
		//     }, milisecs);
		// }

		// function isPBFinished() {
		//     if (getCurrentWidth() >= 100) {
		//         return true;
		//     } else {
		//         return false;
		//     }
		// }

		// function fadeBG(goto) {
		// 	timerStop();
		// 	var $active = $('#slideshow > img.active'),
		// 		$next 	= $active.next(),
		// 		$id 	= $next.attr('data-id');
			
		// 	if($next.is('div')) {
		// 		$next = $('#slideshow > img:first');
		// 	}
		// 	$active.addClass('last-active');

		// 	progressEffect(<?php echo $options['scroller_transition_ms'] ?>);

		// 	$('#slideshow > img.active').removeClass('active').addClass('last-active');
		//     		$('.slide_text.active').removeClass('active').addClass('last-active');
		//     		$('[data-id=' + $id + ']').addClass('active');

		// 	$next.css({opacity: 0.0})
	 //        			.addClass('active')
	 //         			.animate({opacity: 1.0}, <?php echo $options['scroller_transition_ms'] ?>, function() {
	 //         				$('#slideshow > img.last-active').removeClass('last-active');
	 //         			});

	 //     	$('#slideshow > img.active').removeClass('active').addClass('last-active');
  //   		$('.slide_text.active').removeClass('active').addClass('last-active');
  //   		$('[data-id=' + $id + ']').addClass('active');
  //   		$('.thumb-img.active').removeClass('active');	
  //   		$('img[data-id=' + $id + ']').addClass('active');
  //   		console.log("cambiando a id: " + $id);

  //   		$('.timer').css({ width: 0 });	
		// }

		// $(function() {
			
		// 	//activamos cosas
			$('#slide_info .slide_text:first-child').addClass('active');
			$('#slideshow > :first-child').addClass('active');
			$('#slider_index > :first-child').addClass('active');

		// 	//efecto al hacer click sobre la miniatura
		// 	$('.slider_thumb img').click(function() {
		// 		timerStop();

		// 		if(!$(this).hasClass('active')) {
		// 			$id = $(this).attr('data-id');
		//     		$('#slideshow > img.active').removeClass('active').addClass('last-active');
		//     		$('.slide_text.active').removeClass('active').addClass('last-active');
		//     		$('[data-id=' + $id + ']').addClass('active');

		//     		//fundido del fondo.
		//     		$('#slideshow > img.active').css({opacity: 0.0})
	 //        			.addClass('active')
	 //         			.animate({opacity: 1.0}, <?php echo $options['scroller_transition_ms'] ?>, function() {
	 //         				$('#slideshow > img.last-active').removeClass('last-active');
	 //         			});

	 //         		$('.thumb-img.active').removeClass('active');
	 // 				$(this).addClass('active');
	 // 				//fadeBGInterval = setInterval( "fadeBG()", <?php echo $options['scroller_interval_ms'] ?> );
		// 		}
		// 	});
		// 	fadeBGInterval = setInterval( "fadeBG()", <?php echo $options['scroller_interval_ms'] ?> );
		// });
	</script>
</body>
</html>