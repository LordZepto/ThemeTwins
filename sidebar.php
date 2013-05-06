<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
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

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area container_4" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
<?php endif; ?>