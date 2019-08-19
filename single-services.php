<?php get_header(); /* Activity Post */

// Hero
$icon = get_field('service_icon');

?>

<section class="hero service" style="background: url(' <?php the_post_thumbnail_url( 'featured-img' ); ?> ') center center no-repeat; background-size: cover;">
</section>

<section class="post">
  <div class="container">
    <aside class="three columns">
      <div class="services-list">
        <div class="content">
          <?php $current_post = $post->ID;        
  
              query_posts(array( 
                'post_type' => 'services',
                'showposts' => -1,
                'orderby'   => 'title',
                'order'     => 'ASC',
                
              ));  
            ?>
          <ul>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
            <li <?php if( $current_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
          </ul>
          <?php else : endif; wp_reset_query(); ?>
        </div>
      </div>
      <div class="more-help">
        <div class="content">
          <h4>Need more help?</h4>
          <p>Our friendly team will help you make an informed choice to best suit your specific needs:</p>
          <p>Sales: 01837 55700<br />
            Out of hours: 01837 55700<br />
          info@moorlandfuels.co.uk
          </p>
        </div>
      </div>
    </aside>
    <div class="content nine columns">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>