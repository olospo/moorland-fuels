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

<section class="home_cta">  
    <div class="cta_bg" style="background: url('http://localhost:8888/seven/moorland-fuels/wp-content/uploads/2019/08/unsplash_1.jpg') center center no-repeat; background-size: cover;">
    </div>
    <div class="cta_content cta_slider">
        <div class="slide">
        <div class="content">
          <h3>Lorem ipsum dolor sit amet</h3>
          <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="button secondary reversed">Read more</a>
        </div>
        </div>
        <div class="slide">
          <div class="content">
            <h3>Duis aute irure dolor in repre henderit</h3>
            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="button secondary reversed">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>