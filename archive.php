<?php /* Archive */
get_header(); ?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1><?php the_archive_title() ?></h1>
    </div>
  </div>
</section>

<section class="news">
  <div class="container">
    <div class="twelve columns">
      <div class="main_content">
        <div class="twelve columns">
          <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
            <?php get_template_part('inc/article'); ?>
          <?php endwhile; ?>
        </div>
        <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
        </div>
        <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>