<?php
/**
 *
 * Template Name: Deviantart Template
 * 
 * The deviantart template file, not a template needed but.... fuck it.
 *
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
    <style>
        .deviantBox {
            width: 560px;
            height: 245px;
            margin-left: 40px;
            margin-top: 40px;
            background-color: grey;
            padding: 0;
        }
        .deviantBox img {
            padding: 0;
            margin: 0;
        }
        .deviantTitle {
            position: relative;
            width: 100%;
            height: 50px;
            margin-top: -4px;
            background: #a68b6a;
            color: white;
            text-align: center;
            vertical-align: middle;
        }

        .deviantTitle div {
           /* height: 1em;
            margin: auto auto;*/
            padding-top: 0.8em;

        }
        .deviantTitle:hover {
            background: #db9600;
        }
    </style>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <div id="posts_wrapper" class="container_8">
                <div class="clear"></div>
                <div class="deviantBox">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/deviant1.png" alt="">
                        <div class="deviantTitle">
                            <div>NaizuStudio</div>
                        </div>
                    </a>
                </div>
                <div class="deviantBox">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/deviant2.png" alt="">
                        <div class="deviantTitle"><div>IzumiNara</div></div>
                    </a>
                </div>
                <div class="deviantBox">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/deviant3.png" alt="">
                        <div class="deviantTitle"><div>ManzanaMainy</div></div>
                    </a>
                </div>
            </div>
        </div><!-- #content --> 
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
    <?php themetwins_content_nav( 'nav-below' ); ?>
    <?php get_footer(); ?>