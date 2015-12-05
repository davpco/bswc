<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Chris Lindley Gym Theme
 * @since CLG 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( '404', 'designcub' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'We&rsquo;re sorry but the page you are trying to reach doesn&rsquo;t exist.', 'designcub' ); ?></p>
					

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>