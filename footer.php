<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			Copyright 2013 NaizuStudio |  All Rights Reserved   |   ThemeTwins   |   <a href="#">LordZepto</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
    //apañacoooooo
    if(jQuery('.entry-title').text() == 'Galería') {
      jQuery('.gallery-icon a').attr('rel', 'lightbox[galeria]');
    }
</script>
<?php wp_footer(); ?>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
        //     var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        //     (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        //     g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        //     s.parentNode.insertBefore(g,s)}(document,'script'));
        // </script>
</body>
</html>