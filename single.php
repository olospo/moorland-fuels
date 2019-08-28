<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero single">
  <div class="background" style="background: url(' <?php the_post_thumbnail_url( 'full' ); ?> ') center center no-repeat; background-size: cover;">
</section>

<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
<section class="post">
  <div class="container flex">
    <aside class="three columns">
      <div class="news-dates">
        <ul class="archive">
        <?php $args = array(
        	'type'            => 'yearly',
        	'limit'           => '',
        	'format'          => 'html', 
        	'before'          => '',
        	'after'           => '',
        	'show_post_count' => false,
        	'echo'            => 1,
        	'order'           => 'DESC',
                'post_type'     => 'post'
        );
        wp_get_archives( $args ); ?>
        </ul>
      </div>
      <?php get_template_part('inc/help'); ?>
    </aside>
    <div class="content nine columns extra_gutter">
      <p class="date">Posted on <?php the_time('j F Y'); ?></p>
      <h1><?php the_title(); ?></h1>
      
      <?php the_content(); ?>
      <div class="previous_post one-half column">
        <?php previous_post_link( '%link', '< Previous post'); ?>
      </div>
      <div class="next_post one-half column">
        <?php next_post_link( '%link', 'Next post >'); ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>