<?php /* Page */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</section>

<section class="post">
  <div class="container flex">
    <aside class="three columns">
      <?php get_template_part('inc/help'); ?>
    </aside>
    <div class="content nine columns extra_gutter">
      <?php $content = get_the_content(); if($content) { ?>
        <?php echo $content; ?>
      <?php } ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>