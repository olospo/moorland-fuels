<?php /* Template Name: News */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1><?php the_title(); ?></h1>
      <?php $content = get_the_content(); if($content) { ?>
        <?php echo $content; ?>
      <?php } ?>
    </div>
  </div>
</section>

<section class="news">
  <div class="container">
    <div class="twelve columns">
      <div class="news_listing">
          <?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
              $args = array(
                'post_type'      => 'post',
                'order'          => 'DESC',
                'post_status'    => 'publish',
                'paged'          => $paged
              ); 
              query_posts($args); ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          
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
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>