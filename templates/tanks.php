<?php // Template name: Tanks
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>


<?php if ( has_post_thumbnail() ) { ?>
<section class="hero single">
  <div class="background" style="background: url(' <?php the_post_thumbnail_url( 'full' ); ?> ') center center no-repeat; background-size: cover;">
</section>
<section class="post">
<?php } else { ?>
<section class="post single_tank">
<?php } ?>
  <div class="container flex">
    <aside class="three columns">
      <a href="<?php echo get_site_url(); ?>/tanks/" class="back">< Back to all tanks</a>
      <a href="<?php echo get_site_url(); ?>/bunded-tanks" class="button primary bunded">Bunded tanks</a>
      <a href="<?php echo get_site_url(); ?>/fuel-dispensers" class="button primary fuel">Fuel dispensers</a>
      <a href="<?php echo get_site_url(); ?>/enviroblu-tanks" class="button primary enviroblu">Enviroblu tanks</a>
      <?php get_template_part('inc/help'); ?>
    </aside>
    <div class="content nine columns extra_gutter">
       <h1><?php the_title(); ?></h1>
      <?php $content = get_the_content(); if($content) { ?>
        <?php echo $content; ?>
      <?php } ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>