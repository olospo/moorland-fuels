<?php /* Page */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1><?php the_title(); ?></h1>
      
    </div>
  </div>
</section>

<section class="post">
  <div class="container">
    <aside class="three columns">
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
      <?php $content = get_the_content(); if($content) { ?>
        <?php echo $content; ?>
      <?php } ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>