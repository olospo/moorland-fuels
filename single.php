<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero single" style="background: url(' <?php the_post_thumbnail_url( 'featured-img' ); ?> ') center center no-repeat; background-size: cover;">
</section>

<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
<section class="post">
  <div class="container">
    <aside class="four columns">
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
    <div class="content eight columns">
      <h1><?php the_title(); ?></h1>
      <p><?php the_time('d/m/y'); ?></p>
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php } ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>