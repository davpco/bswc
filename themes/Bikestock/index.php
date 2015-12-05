<?php /* Index */ ?>

<?php get_header(); ?>

      <div id="content">
        <div class="wrapper row-fluid">
          <div class="span8 offset2">
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="content">
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            <?php the_content(); ?>
          </div>
          <?php endwhile; endif; ?>
          </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>


