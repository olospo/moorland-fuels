<?php /* Page */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>


<?php if ( has_post_thumbnail() ) { ?>
<section class="hero single">
  <div class="background" style="background: url(' <?php the_post_thumbnail_url( 'full' ); ?> ') center center no-repeat; background-size: cover;">
</section>
<section class="post">
<?php } else { ?>
<section class="post no_hero">
<?php } ?>
  <div class="container flex">
    <aside class="three columns">
      <?php global $post;
        $parent = get_post($post->post_parent);
        $current_post = $post->ID;
      if ( $post->post_parent ) :  // if it's a child
        $siblings = new WP_Query( array(
            'post_type' => 'page',
            'post_parent' => $post->post_parent
        ) );
        if ( $siblings->have_posts() ) :
      ?>
      <div class="services-list">
        <div class="content">
          <ul>
            <li><a href="<?php the_permalink($parent); ?>"><?php echo $parent->post_title; ?></a></li>
            <?php while ( $siblings->have_posts() ) : $siblings->the_post(); ?>
            <li <?php if( $current_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
      <?php endif; endif; ?>
      
      <?php global $post;
      if ( $post ) :  // if it's a child
        $siblings = new WP_Query( array(
            'post_type' => 'page',
            'post_parent' => $post->ID
        ) );
        if ( $siblings->have_posts() ) :
      ?>
      <div class="services-list">
        <div class="content">
          <ul>
            <li class="current"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php while ( $siblings->have_posts() ) : $siblings->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
      <?php endif; endif; ?>
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