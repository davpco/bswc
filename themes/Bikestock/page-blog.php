<?php /**
 * Template Name: Blog Page
 */ ?>

<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="content">
      <div class="wrapper row-fluid">
        <div class="span12">
          <?php echo get_recent_blog_posts(); ?>
        </div>
      </div>
    </div>
  </div>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>


