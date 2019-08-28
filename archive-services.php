<?php /* Services Archive */
get_header(); 
?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1>Our services</h1>
      <?php the_field('service_content','options'); ?>
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