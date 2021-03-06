<?php
/**
 * Template Name: Home Template
 *
 * Description: A template for the home page, this has a slider of recent posts
 *
 * @package WordPress
 * @subpackage ThemeTwins
 * @version 1.0
 * @date 18/02/013
 * @author LordZepto
 * @link http://lordzepto.net
 * 
 */
?><!DOCTYPE html>
<?php $options = get_option('theme_twins_options'); ?>
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
				<?php wp_nav_menu( array( 'theme_location' => 'Home', 'menu_class' => 'nav-menu', 'menu' => 'Home') ); // Si creamos un menu predefinido para este elemento, se puede llamar desde aqui con 'menu' => 'nombredelmenu', solo hay que re-estilarlo entero :S?>
			</nav><!-- #site-navigation -->
			<div class="timerParent">
				<div class="timer"></div>
			</div>
		</div>
		<div id="container">
			<div id="slideshow">
				<?php
	            $the_query = new WP_Query('showposts='. $options['scroller_number_of_posts'] . '&orderby=post_date&order=desc'); 
	            while ($the_query->have_posts()) : $the_query->the_post(); ?>
	            <div class="bgContainer" data-id="<?php the_ID() ?>" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>');">
	            	
	            </div>
	                               
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
		                	<div class="slider_thumb" data-id="<?php the_ID() ?>" style="background-image: url('<?php echo get_post_sliderindex_url('post', 'sliderindex') ?>') ">
		                		
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

		jQuery(document).ready(function($) {

			homeEffect.init($('.timer'), $('.bgContainer'), $('.slide_text'));
			$('#slide_info .slide_text:first-child').addClass('active');// aadd this to the init routine.
			$('#slideshow > :first-child ').addClass('active'); // aadd this to the init routine.
			$('#slider_index > :first-child').addClass('active'); // aadd this to the init routine.

		});
		
		var homeEffect = {
			// TODO: Discover the random bug where the effect just stops
			init: function(timer, bgList, contentContainer) {
				this.timer 				= timer;
				this.bgList 			= bgList;
				this.bgLength 			= this.bgList.length;
				this.bgLast 			= this.bgList.last();
				this.progressStep		= 6000 / (10);
				//this.pbinterval			= this.progressBar(this.progressStep);
				this.timer.css({width:0});
				$('.slider_thumb').click(function(){homeEffect.indexImage($(this).attr('data-id'))});
				console.log('bgLength: ' + this.bgLength); // Start checking if only 1 image, effect = off.
			},
			getCurrentWidth: function () {
				var width = this.timer.width();
				var parentWidth = this.timer.offsetParent().width();
				var percent = 100*width/parentWidth;

				return percent;
			},
			fadeEffect: function(from, to) {
				to.addClass('next-active').css({ opacity:1 });
				from.animate({opacity: 0.0}, 1000, function() {
			  		from.removeClass('active');
			  		to.removeClass('next-active').addClass('active').css({opacity: 1});
			  	});
			  	this.contentEffect(to.attr('data-id'));
			  	this.timer.css({width:0}); 	
			},
			contentEffect: function(id) {
				$('.slide_text.active, .slider_thumb.active').removeClass('active');
	    		$('[data-id=' + id + ']').addClass('active');
			},
			indexImage: function(id) {
				clearInterval(this.progressBar);
				$('.slide_text.active, .slider_thumb.active').removeClass('active');
				$('.slide_text[data-id=' + id + '], .slider_thumb[data-id=' + id + ']').addClass('active');
				this.fadeEffect($('.bgContainer.active'), $('.bgContainer[data-id=' + id + ']'));	
			},
			progressBar: function(time) {
				
				timer = setInterval(function () {
					var nextwidth 	= homeEffect.getCurrentWidth() + 0.4 + "%",
						from 		= $('.bgContainer.active'),
						to 			= $('.bgContainer.active').next();

					homeEffect.timer.width( nextwidth );
					if (homeEffect.getCurrentWidth() >= '100') {
						homeEffect.index = from.parent().children('div').index(from)+1;
						if(homeEffect.index == homeEffect.bgLength) {
							to = homeEffect.bgList.first(); 
							homeEffect.index = 1;
						}
						homeEffect.fadeEffect(from, to);
					}
				}, 25); // Calculate "time" and replace this... 

				$('#slider_container').hover(function(){
					clearInterval(timer);
				}, function() {
					clearInterval(timer);
					homeEffect.progressBar(homeEffect.progressStep);
				});
			},
		};
	</script>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-38560165-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html>