<?php /* Services Archive */
get_header(); 
?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1>Our services</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
</section>

<section class="post service_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="main_content">
        <div class="twelve columns grid">
          <?php 
            query_posts(array( 
              'post_type' => 'services',
              'showposts' => -1,
              'orderby'   => 'title',
              'order'     => 'ASC',
            ));  
          ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); $icon = get_field('service_icon'); ?>
          
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
        <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>