<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="quick_quote">
  <div class="container">
    <h3>Looking for a quick fuel price?</h3><a href="#" class="button secondary reversed">Get a quote</a>
  </div>
</section>

<section class="services_slider">
  <div class="container">
    <div class="content eight columns offset-by-two">
    <p>Moorland Fuels’ tankers are a familiar sight throughout the Devon community. During the cold winter months we consider ourselves the fifth emergency service, providing customers with the efficient heating oil delivery, when they need it.</p>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>