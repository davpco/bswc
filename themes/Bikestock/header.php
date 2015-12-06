<?php /* HEADER TEMPLATE */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>"/>
    <title><?php bloginfo('name'); ?><?php wp_title('&raquo;', true, 'left'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta property="og:title" content="<?php echo get_field("share_title"); ?>"/>
    <meta property="og:description" content="<?php echo get_field("share_description"); ?>"/>
    <meta property="og:image" content="<?php echo get_field("share_image"); ?>"/>
    <meta name="p:domain_verify" content="7f2c34e72169f3e61b08936f84deb9a0"/>
    <?php if (is_page('opportunities')) { ?>
        <meta name="robots" content="noindex,nofollow">
    <?php } ?>

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>"/>
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="google-site-verification" content="o090oSONGOp96TIcN7NmO5PeSweDRxz4MfVv_d3rmtE"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ss/style1.min.css?v=<?php echo rand(); ?>"/>
    <!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ss/ie.css" />
    <![endif]-->

    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/flavicon.png">

    <!-- FBC CODE -->
    <?php

    $fbc = get_field("fbc_code");

    if (@$fbc != '') {
        echo $fbc;
    }

    ?>

    <?php if (is_page_template("page-new-map.php")) { //wp_head(); ?>

        <link rel='stylesheet' id='mappress-css'
              href='http://bs.durlanvega.com/wp-content/plugins/mappress-google-maps-for-wordpress/css/mappress.css?ver=2.41'
              type='text/css' media='all'/>

        <style>
            #content .content {
                max-width: 100% !important;
            }

            .mapp-layout {
                margin: 0;
                height: 100% !important;
            }

            #map-canvas {
                height: 100%;
                position: absolute;
                display: block;
                width: 100%;
                z-index: 100;
            }

            #zoomControl {
                position: absolute;
                right: 15px;
                top: 40px;
                z-index: 500;
            }

            .mapInfo {
                position: relative;
                float: left;
                top: 0;
                overflow: hidden;
                z-index: 200;
                width: 17.8%;
                background-color: #f0592a;
                margin-bottom: 30px;
            }

            .page-template-page-new-map-php #showFooter {
                background: #f0592a url(../img/down_arrow.png) repeat-y;
                background-size: 26px;
                background-position: 6px 5px;
            }

            .mapp-links, .mapp-title {
                display: block !important;
            }

            .mapp-map-links {
                display: none !important;
            }

            .page-template-page-new-map-php #header {
                border: 10px solid #f0592a;
                border-bottom: 0;
            }

            #borderWrap .top, #borderWrap .bottom, #borderWrap .right, #borderWrap .left {
                background: #f0592a;
            }

            .mapp-control {
                right: 25px !important;
            }
        </style>
    <?php } ?>

    <!-- FACEBOOK ORIGINAL -->
    <script>(function () {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement('script');
                fbds.async = true;
                fbds.src = '//connect.facebook.net/en_US/fbds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
            _fbq.push(['addPixelId', '246139175574684']);
        })();
        window._fbq = window._fbq || [];
        window._fbq.push(['track', 'PixelInitialized', {}]);
    </script>

    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=246139175574684&ev=NoScript"/>
    </noscript>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/extra.css"/>

    <?php if (is_woocommerce() || is_cart() || is_checkout() ) {
        wp_head();
    } ?>
</head>

<body <?php body_class(); ?>>
<div id="borderWrap">
    <div class="top"></div>
    <div class="left"></div>
    <div class="right"></div>
    <div class="bottom"></div>
</div>
<div id="header">
    <div class="wrapper row-fluid">
        <div class="span5">
            <div class="menuTop hide-mobile">
                <?php
                // LEFT MENU
                $menu_name = 'left-bike-menu';
                if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])):
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);
                    $menu_items = wp_get_nav_menu_items($menu->term_id);
                    ?>
                    <ul class="new_menu left_menu">
                        <?php foreach ((array)$menu_items as $key => $menu_item) {
                        $classes = "";
                        foreach ($menu_item->classes as $class) {
                            $classes .= $class . " ";
                        }
                        if ($menu_item->menu_item_parent != 0) {
                        if ($child_open != true):
                        ?>
                        <ul class="new_menu_child children_of_<?php echo $menu_item->menu_item_parent; ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/img/mini_arrow.png" alt="" class="mini_arrow">
                            <?php $child_open = true;
                            endif; ?>

                            <li>
                                <a href="<?php echo $menu_item->url; ?>" title="<?php echo $menu_item->attr_title; ?>"
                                   class="<?php echo $classes; ?>"><?php echo $menu_item->title; ?></a>
                            </li>

                            <?php } else { ?>
                            <?php if ($child_open == true):
                            $child_open = false; ?>
                        </ul>
                    <?php endif; ?>
                        </li>

                        <li class="span4">
                            <a href="<?php echo $menu_item->url; ?>" title="<?php echo $menu_item->attr_title; ?>"
                               class="<?php echo $classes; ?>"><?php echo $menu_item->title; ?></a>
                            <?php } ?>

                            <?php } ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="span2 logotop">
            <a class="bslogo" href="<?php bloginfo('url'); ?>" title="Bikestock"><img
                    src="<?php bloginfo('template_directory'); ?>/img/bikelogo.png" alt="Bikestock"/></a>
        </div>

        <div class="span5">

            <div class="menuTop hide-mobile">
                <?php
                // RIGHT MENU
                $menu_name = 'right-bike-menu';
                if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])):
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);
                    $menu_items = wp_get_nav_menu_items($menu->term_id);
                    ?>
                    <ul class="new_menu right_menu">
                        <?php foreach ((array)$menu_items as $key => $menu_item) {
                            $classes = "";
                            foreach ($menu_item->classes as $class) {
                                $classes .= $class . " ";
                            }
                            ?>

                            <li class="span4">
                                <a href="<?php echo $menu_item->url; ?>" title="<?php echo $menu_item->attr_title; ?>"
                                   class="<?php echo $classes; ?>"><?php echo $menu_item->title; ?></a>
                            </li>

                        <?php } ?>

                        <li class="span4">
                            <div id="signup" class="login">
                                <h4>Sign up</h4><img src="<?php bloginfo('template_directory'); ?>/img/signup-icon.png?v=1" alt="signup"/>
                            </div>
                        </li>

                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<div id="mobileNavigation" class="show-mobile">
    <div class="hamburger">
        <div class="bun"></div>
        <div class="bun"></div>
        <div class="bun"></div>
    </div>
    <?php wp_nav_menu(array('theme_location' => 'bike-menu')); ?>
</div>

<div id="homeMove">






