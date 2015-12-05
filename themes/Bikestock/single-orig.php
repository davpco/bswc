<?php /* Index */ ?>

<?php get_header('blog'); ?>

      <div id="content">
        <div class="wrapper row-fluid">
          <div class="span8 offset2">
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
          <?php endwhile; endif; ?>
          </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>


