<?php /* Template Name: Contact*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
  </div>
</section>

<section class="post">
  <div class="container flex">
    <aside class="three columns">
      <?php get_template_part('inc/help'); ?>
      <div class="map">
        <a href="<?php the_field('map_link'); ?>" target="_blank">
        <div class="content">
          <img src="<?php the_field('map_image'); ?>">
        </div>
        <div class="find_us">
          <h4>How to find us</h4>
        </div>
        </a>
      </div>
    </aside>
    <div class="content nine columns extra_gutter">
      <?php echo do_shortcode('[ninja_form id=1]'); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>