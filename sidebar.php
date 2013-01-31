<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area container_4" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
<?php endif; ?>


<?php 
/**
 * 
*
*
*
*
*  <div id="sidebar" class="container_4">
*        <div id="menu" class="grid_4">
*            <ul>
*                <li><a href="#">Home</a></li>
*                <li><a href="#">Acerca De</a></li>
*                <li><a href="#">Comics</a></li>
*                <li><a href="#">Galería</a></li>
*                <li><a href="#">Deviantart</a></li>
*                <li><a href="#">Blog</a></li>
*            </ul>
*        </div>
*        <div class="clear"></div>
*        <div id="recent_posts" class="grid_4">
*            <h3>Posts recientes: </h3>
*            <ul>
*                <li><a href="#">Lorem Ipsum</a></li>
*                <li><a href="#">Lorem Ipsum</a></li>
*                <li><a href="#">Lorem Ipsum</a></li>
*                <li><a href="#">Lorem Ipsum</a></li>
*                <li><a href="#">Lorem Ipsum</a></li>
*                <li><a href="#">Lorem Ipsum</a></li>
*            </ul>
*        </div>
*        <div class="clear"></div>
*        <div id="social" class="grid_4">
*            <h3>Siguenos en: </h3>
*            <ul>
*                <li><a href="#"><!-- <img src="" alt="deviantart">--></a></li>
*                <li><a href="#"><!-- <img src="" alt="twitter"> --></a></li>
*                <li><a href="#"><!-- <img src="" alt="tumblr"> --></a></li>
*            </ul>
*        </div>
*        <div class="clear"></div>
*        <div id="twitter" class="grid_4">
*            <h3>Twitter</h3>
*            <ul>
*                <li>
*                    <p class="tweet"><span class="t_username">@ManzanaMainy </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis delectus voluptas ullam ducimus explicabo dicta esse accusantium sed animi dignissimos laboriosam asperiores itaque iusto tempora autem cum voluptatibus unde soluta!</p>
*                    <p class="t_timestamp">less than a minute ago</p>
*                </li>
*                <li>
*                    <p class="tweet"><span class="t_username">@ManzanaMainy </span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit corporis tempora excepturi cum et exercitationem facilis soluta quaerat quas impedit ex culpa esse veniam dolore voluptatum amet natus. Eveniet sapiente.</p>
*                    <p class="t_timestamp">less than a minute ago</p>
*                </li>
*                <li>
*                    <p class="tweet"><span class="t_username">@ManzanaMainy </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit officiis odio voluptatem quasi facilis. Nobis voluptatem commodi consequuntur minima soluta facere fuga obcaecati magni voluptatum quia incidunt sit quis non!</p>
*                    <p class="t_timestamp">less than a minute ago</p>
*                </li>
*            </ul>
*        </div>
*    </div>
*    <div class="clear"></div>
*    <div id="pagination" class="container_12">
*        <a href="#" class="page prev">< Previous</a>
*        <a href="#" class="page">2</a>
*        <a href="#" class="page">3</a>
*        <span class="page selected">4</span>
*        <a href="#" class="page">5</a>
*        <a href="#" class="page">6</a>
*        <a href="#" class="page next">Next ></a>
*    </div>
*</div> 
*
*<div id="secondary" class="widget-area" role="complementary">
*    <aside id="search-2" class="widget widget_search">
*        <form role="search" method="get" id="searchform" action="http://naizustudio.dev/wordpress/">
*            <div>
*                <label class="screen-reader-text" for="s">Buscar por:</label>
*                <input type="text" value="" name="s" id="s">
*                <input type="submit" id="searchsubmit" value="Buscar">
*            </div>
*        </form>
*    </aside>
*    <aside id="nav_menu-2" class="widget widget_nav_menu">
*        <div class="menu-lateral-container">
*            <ul id="menu-lateral" class="menu">
*                <li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103">
*                    <a href="http://naizustudio.dev/wordpress/">Home</a>
*                </li>
*                <li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-102">
*                    <a href="http://naizustudio.dev/wordpress/acerca-de/">Acerca de</a>
*                </li>
*                <li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101">
*                    <a href="http://naizustudio.dev/wordpress/comics/">Comics</a>
*                    <ul class="sub-menu">
*                        <li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135">
*                            <a href="http://naizustudio.dev/wordpress/comics/love-potion/">Love Potion</a>
*                        </li>
*                        <li id="menu-item-134" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-134">
*                            <a href="http://naizustudio.dev/wordpress/comics/screw/">Screw</a>
*                        </li>
*                        <li id="menu-item-133" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-133">
*                            <a href="http://naizustudio.dev/wordpress/comics/bones/">Bones</a>
*                        </li>
*                        <li id="menu-item-132" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-132">
*                            <a href="http://naizustudio.dev/wordpress/comics/karma/">Karma</a>
*                        </li>
*                    </ul>
*                </li>
*                <li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100">
*                    <a href="http://naizustudio.dev/wordpress/galeria/">Galería</a>
*                </li>
*                <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99">
*                    <a href="http://naizustudio.dev/wordpress/deviantart/">Deviantart</a>
*                    <ul class="sub-menu">
*                        <li id="menu-item-131" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-131">
*                            <a href="http://naizustudio.dev/wordpress/deviantart/naizustudio/">NaizuStudio</a>
*                        </li>
*                        <li id="menu-item-130" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-130">
*                            <a href="http://naizustudio.dev/wordpress/deviantart/izuminara/">IzumiNara</a>
*                        </li>
*                        <li id="menu-item-129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-129">
*                            <a href="http://naizustudio.dev/wordpress/deviantart/manzanamainy/">ManzanaMainy</a>
*                        </li>
*                    </ul>
*                </li>
*                <li id="menu-item-111" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-109 current_page_item current_page_parent menu-item-111">
*                    <a href="http://naizustudio.dev/wordpress/blog/">Blog</a>
*                </li>
*            </ul>
*        </div>
*    </aside>
*    <aside id="recent-posts-2" class="widget widget_recent_entries">
*            <h3 class="widget-title">Entradas recientes</h3>
*
*        <ul>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/test1/" title="test1">test1</a>
*            </li>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/another-post-with-everything-in-it/"
*                title="Another Post with Everything In It">Another Post with Everything In It</a>
*            </li>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/an-ordered-list-post/" title="An Ordered List Post">An Ordered List Post</a>
*            </li>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/a-simple-text-post/" title="A Simple Text Post">A Simple Text Post</a>
*            </li>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/hello-world/" title="Hello world!">Hello world!</a>
*            </li>
*        </ul>
*    </aside>
*    <aside id="archives-2" class="widget widget_archive">
*            <h3 class="widget-title">Archivos</h3>
*
*        <ul>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/2013/01/" title="enero 2013">enero 2013</a>
*            </li>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/2008/09/" title="septiembre 2008">septiembre 2008</a>
*            </li>
*            <li>
*                <a href="http://naizustudio.dev/wordpress/2008/08/" title="agosto 2008">agosto 2008</a>
*            </li>
*        </ul>
*    </aside>
*    <aside id="twitter-2" class="widget widget_twitter">
*        <div>
*                <h3 class="widget-title"><span class="twitterwidget twitterwidget-title">Twitter</span></h3>
*
*            <ul>
*                <li><span class="entry-content"><a href="http://twitter.com/XianNuStudio" class="twitter-user" target="_blank">@XianNuStudio</a> oks, pues preguntaré a la imprenta donde voy a llevarlo, para que me informen ^^ Gracias agaiin! :D</span>
*                    <span
*                    class="entry-meta"><span class="time-meta"><a href="http://twitter.com/NaizuStudio/statuses/290791323810795520" target="_blank">12:03:48 PM enero 14, 2013</a></span>
*                        <span
*                        class="in-reply-to-meta">
*                            <a href="http://twitter.com/XianNuStudio/statuses/290758942848598016"
*                            class="reply-to" target="_blank">en respuesta a XianNuStudio</a>
*                            </span>
*                            </span><span class="intent-meta"><a href="http://twitter.com/intent/tweet?in_reply_to=290791323810795520" class="in-reply-to" data-lang="es" title="Reply" target="_blank">Reply</a><a href="http://twitter.com/intent/retweet?tweet_id=290791323810795520" class="retweet" data-lang="es" title="Retweet" target="_blank">Retweet</a><a href="http://twitter.com/intent/favorite?tweet_id=290791323810795520" class="favorite" data-lang="es" title="Favorite" target="_blank">Favorite</a></span>
*                </li>
*                <li><span class="entry-content"><a href="http://twitter.com/XianNuStudio" class="twitter-user" target="_blank">@XianNuStudio</a> si guardo directamente en pdf, me hace unos cuadros en las tramas.Con que formato se envían las paginas del manga a imprimir?</span>
*                    <span
*                    class="entry-meta"><span class="time-meta"><a href="http://twitter.com/NaizuStudio/statuses/290602878119337984" target="_blank">11:34:59 PM enero 13, 2013</a></span>
*                        <span
*                        class="in-reply-to-meta">
*                            <a href="http://twitter.com/XianNuStudio/statuses/290590262655336448"
*                            class="reply-to" target="_blank">en respuesta a XianNuStudio</a>
*                            </span>
*                            </span><span class="intent-meta"><a href="http://twitter.com/intent/tweet?in_reply_to=290602878119337984" class="in-reply-to" data-lang="es" title="Reply" target="_blank">Reply</a><a href="http://twitter.com/intent/retweet?tweet_id=290602878119337984" class="retweet" data-lang="es" title="Retweet" target="_blank">Retweet</a><a href="http://twitter.com/intent/favorite?tweet_id=290602878119337984" class="favorite" data-lang="es" title="Favorite" target="_blank">Favorite</a></span>
*                </li>
*                <li><span class="entry-content"><a href="http://twitter.com/XianNuStudio" class="twitter-user" target="_blank">@XianNuStudio</a> cuando pasas a mapa de bits, no te da la opción de guardar en jpg, tienes primero que pasarlo a escala de grises</span>
*                    <span
*                    class="entry-meta"><span class="time-meta"><a href="http://twitter.com/NaizuStudio/statuses/290602421435121664" target="_blank">11:33:11 PM enero 13, 2013</a></span>
*                        <span
*                        class="in-reply-to-meta">
*                            <a href="http://twitter.com/XianNuStudio/statuses/290590262655336448"
*                            class="reply-to" target="_blank">en respuesta a XianNuStudio</a>
*                            </span>
*                            </span><span class="intent-meta"><a href="http://twitter.com/intent/tweet?in_reply_to=290602421435121664" class="in-reply-to" data-lang="es" title="Reply" target="_blank">Reply</a><a href="http://twitter.com/intent/retweet?tweet_id=290602421435121664" class="retweet" data-lang="es" title="Retweet" target="_blank">Retweet</a><a href="http://twitter.com/intent/favorite?tweet_id=290602421435121664" class="favorite" data-lang="es" title="Favorite" target="_blank">Favorite</a></span>
*                </li>
*            </ul>
*            <div class="follow-button">
*                <iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.1359159993.html#_=1359504604286&amp;id=twitter-widget-0&amp;lang=es&amp;screen_name=naizustudio&amp;show_count=true&amp;show_screen_name=true&amp;size=m"
*                class="twitter-follow-button twitter-follow-button" style="width: 255px; height: 20px;"
*                title="Twitter Follow Button" data-twttr-rendered="true"></iframe>
*            </div>
*        </div>
*    </aside>
*</div>
 */


 ?>