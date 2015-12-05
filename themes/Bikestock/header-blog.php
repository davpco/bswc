<?php /* HEADER TEMPLATE */ ?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php wp_title('&raquo;', true, 'left'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta property="og:title" content="<?php bloginfo('name'); ?>"/>
	<meta property="og:image" content="<?php echo $options['meta_image']; ?>"/>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <meta name="google-site-verification" content="o090oSONGOp96TIcN7NmO5PeSweDRxz4MfVv_d3rmtE" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ss/reset.css" />
    <link href="<?php bloginfo('template_directory'); ?>/ss/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ss/custom.css" />
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ss/ie.css" />
	<![endif]-->

  <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/flavicon.png">

</head>

<body <?php body_class(); ?>>
<div id="header">
    <div class="wrapper row-fluid">
        <div class="span2">
            <a href="<?php bloginfo('url'); ?>">Back Home</a>
        </div>
        <div class="span8">
          <a href="<?php bloginfo('url'); ?>" title="Bikestock"><img src="<?php bloginfo('template_directory'); ?>/img/bikelogo.png" alt="Bikestock" /></a>
        </div>
        <div class="span2">
            <a href="<?php bloginfo('url'); ?>/blog">The Blog</a>
        </div>
      </div>
    </div>
