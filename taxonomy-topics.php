<?php /* FAQ Topic */
get_header(); ?>

<section class="hero small faq">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1>FAQs</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae purus non orci sollicitudin vestibulum. Maecenas nulla metus, feugiat eu dictum quis, vestibulum viverra erat. Vestibulum ac porttitor nulla. Nam at elementum felis, id rhoncus mauris. Nulla eget ipsum quis felis accumsan condimentum. Pellentesque nec imperdiet urna. Praesent id quam feugiat, eleifend risus ac, volutpat quam. Maecenas sodales dictum tempus.</p>
    </div>
  </div>
</section>
<section class="faq_topics">
  <div class="container">
    <div class="twelve columns">
    <?php $taxonomy = 'topics'; $terms = get_terms($taxonomy);
      $currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      if ( $terms && !is_wp_error( $terms ) ) :
    ?>
    <ul class="topics">
      <?php foreach ( $terms as $term ) { $class = $currentterm->slug == $term->slug ? 'current' : '' ; ?>
        <li class="<?php echo $class; ?>"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
      <?php } ?>
    </ul>
    </div>
  </div>
</section>
<section class="faq_listing">
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
  <div class="nine columns">
    <?php endif;  wp_reset_query();?>
    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
      <div class="tab">
        <div class="accordionItem close">
        <h3 class="accordionItemHeading"><?php the_title(); ?></h3>
          <div class="accordionItemContent">
            <?php the_content(); ?>        
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <?php // Todo: Make sure all FAQs disply on one page ?>
    </div>
    <?php else : ?>
      <!-- No posts found -->
    <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>