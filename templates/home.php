<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="small_cta">
  <div class="container">
    <h3>Looking for a quick fuel price?</h3><a href="#" class="button secondary reversed">Get a quote</a>
  </div>
</section>

<section class="services_slider">
  <div class="container">
    <div class="content eight columns offset-by-two">
    <p>Moorland Fuels’ tankers are a familiar sight throughout the Devon community. During the cold winter months we consider ourselves the fifth emergency service, providing customers with the efficient heating oil delivery, when they need it.</p>
    </div>
    <div class="content twelve columns">
      <?php       
      query_posts(array( 
        'post_type' => 'services',
        'showposts' => -1,
        'orderby'   => 'rand',
        'order'     => 'ASC',
              
      ));  
      ?>
        <div class="service-scroll">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <?php $icon = get_field('service_icon'); ?>
          <article>
            <a href="<?php the_permalink(); ?>">
            <div class="image">
              <div class="border">
              <img src="<?php echo $icon['url']; ?>" />
              </div>
            </div>
            <div class="content">
              <h3><?php the_title(); ?></h3>
            </div></a>
          </article>
        <?php endwhile; ?>
        </div>
        <?php else : endif; wp_reset_query(); ?>
    <a href="<?php echo get_site_url(); ?>/services" class="button primary">View all Services</a>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>