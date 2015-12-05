<?php /**
 * Template Name: Front Page Template
 */ ?>

<?php get_header(); ?>
<div class="wrapper row-fluid">
  <div class="span12">

  </div>
</div>

<div class="flexslider" id="slideShow">
  <ul class="slides">

<?php
$rows = get_field('slideshow');
$slideNum = 1;
if($rows)
{
	foreach($rows as $row)
	{
		echo '<li class="slide'.$slideNum.'"><img class="hidden" src="' . $row['image'] . '" alt="" /></li>';
	  $slideNum++;
  }

} ?>



  </ul>
    <div class="pager-nav"></div>
</div>

   <div id="showFooter" class="active"></div>

    <div id="content">
      <div class="wrapper row-fluid">
        <div class="span10 offset1">
          <div class="content">
            <div id="Grid">
              <li class="item1 active"><img src="<?php bloginfo('template_directory'); ?>/img/stock-icon.png" alt="" />
                <h2>Machine</h2>
                <p>Check out our machine and what it has to offer.</p>
                <a href="<?php bloginfo('url'); ?>/machine" class="btn btn-yellow">Take a Look</a>
              </li>
              <li class="item2"><img src="<?php bloginfo('template_directory'); ?>/img/pin-icon.png" alt="" />
                <h2>Locations</h2>
                <p>Find our locations nearest you.</p>
                <a href="<?php bloginfo('url'); ?>/locations" class="btn btn-yellow">See Locations</a>
              </li>
              <li class="item3"><img src="<?php bloginfo('template_directory'); ?>/img/shop_icon.png" alt="" />
                <h2>Shop</h2>
                <p>We're testing out some new products on our beta shop.</p>
                <a href="https://bikestock.myshopify.com/" class="btn btn-yellow" target="_blank">Shop Now</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php get_footer(); ?>