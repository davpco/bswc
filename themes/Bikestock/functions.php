<?php

function register_my_menus()
{
    register_nav_menus(
        array('bike-menu' => __('Bike Menu'))
    );
    register_nav_menus(
        array('left-bike-menu' => __('Left Menu'))
    );
    register_nav_menus(
        array('right-bike-menu' => __('Right Menu'))
    );
}

add_action('init', 'register_my_menus');
// disable the admin bar
add_filter('show_admin_bar', '__return_false');
add_theme_support('post-thumbnails');
remove_action('wp_head', 'rsd_link');
/* create custom post type for Board Members */


function get_recent_blog_posts()
{
    $args = array(
        'numberposts' => '3',
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'post_date',
        'order' => 'DESC'
    );
    $posts = get_posts($args);
    foreach ($posts as $post) {
        $author = get_userdata($post->post_author);
        $thumb = get_the_post_thumbnail($post->ID, 'medium');
        $thumb = '<img src="' . $first_img . '" alt="" />';
        $html .= '
			<a href="' . get_permalink($post->ID) . '" class="blog_post_link">
				<div class="image_wrapper">' . $thumb . '</div>
				<div class="blog_post_link_text">
					<h4>' . $post->post_title . '</h4>
					<div class="subhead">' . date('F j', strtotime($post->post_date)) . '  &bull;  by ' . $author->display_name . '</div>
					<p>' . $post->post_excerpt . '</p>
				</div>
				<div class="clearfix"></div>
			</a>
		';
    }
    return $html;
}


if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => __('Sidebar Widgets'),
        'id' => 'mycustomwidgetarea',
        'description' => __('An optional widget area for your site footer', 'twentyeleven'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

/**
 * ENQUEUE SCRIPTS
 * This snippet goes in functions.php in your theme folder
 */
function custom_scripts_method()
{
    wp_enqueue_script(
        'mailchimp-validate',
        'http://downloads.mailchimp.com/js/jquery.form-n-validate.js',
        array('jquery')
    );
}

add_action('wp_enqueue_scripts', 'custom_scripts_method');

function remove_cssjs_ver($src)
{
    if (strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}
