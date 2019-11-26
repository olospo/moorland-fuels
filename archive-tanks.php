<?php /* Services Archive */
get_header(); 
?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1>Tank orders</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div class="basic_filters">
        <h2>Find out more about our product ranges:</h2>
        <a href="#" class="button primary bunded">Bunded tanks</a>
        <a href="#" class="button primary fuel">Fuel dispensers</a>
        <a href="#" class="button primary enviroblu">Enviroblu tanks</a>
      </div>
    </div>
  </div>
</section>

<section class="post tank_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="main_content">
        <div class="twelve columns grid">
          <?php 
            query_posts(array( 
              'post_type' => 'tanks',
              'showposts' => -1,
              'orderby'   => 'title',
              'order'     => 'ASC',
            ));  
          ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); $icon = get_field('service_icon'); ?>
          
          <article>
            <a href="<?php the_permalink(); ?>">
            <div class="image">
              <img src="<?php echo $icon['url']; ?>" />
            </div>
            </a>
            <div class="heading">
              <h3><?php the_title(); ?></h3>
            </div>
            <div class="content">
              <div class="litres">
                <div class="brimful">850 litres<span class="info">Brimful</span></div>
                <div class="nominal">850 litres<span class="info">Nominal</span></div>
              </div>
              <div class="size">
                <div class="length">1735mm<span class="info">Length</div>
                <div class="width">1735mm<span class="info">Width</div>
                <div class="height">1735mm<span class="info">Height</div>
              </div>
              <div class="footprint">
                1512 x 2354mm <span class="info">Footprint</span>
              </div>
              <a href="<?php the_permalink(); ?>" class="button primary">View product</a>
            
            </div>
          </article>
          
          <?php endwhile; ?>
        </div>
        <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>