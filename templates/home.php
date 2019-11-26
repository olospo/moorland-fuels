<?php /* Template Name: Home */
get_header();

// Vars
$serviceText = get_field('services_text');
$ctaBG = get_field('cta_background_image');

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="half_cta">
  <div class="background"></div>
  <div class="container">
  <div class="price">
    <div class="content">
    <h3>Looking for a quick fuel price?</h3><a href="<?php the_field('order_quote_link','option'); ?>" target="_blank" class="button secondary reversed">Get a quote</a>
    </div>
  </div>
  <div class="tanks">
    <div class="content">
    <h3>Interested in our range of fuel tanks?</h3><a href="<?php echo get_site_url(); ?>/tanks" class="button secondary reversed">Shop now</a>
    </div>
  </div>
  </div>
</section>

<section class="services_slider">
  <div class="container">
    <div class="content eight columns offset-by-two">
    <?php echo $serviceText; ?>
    </div>
    <div class="content ten columns offset-by-one">
      <?php       
      query_posts(array( 
        'post_type' => 'services',
        'showposts' => -1,
        'orderby'   => 'rand',
        'order'     => 'ASC',
              
      ));  
      ?>
        <div class="service-scroll row">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
        
          <?php $icon = get_field('service_icon'); ?>
          <article>
            <a href="<?php the_permalink(); ?>">
            <div class="image">
              <div class="border">
              <img src="<?php echo $icon['url']; ?>"/>
              </div>
            </div>
            <div class="content">
              <h3><?php the_title(); ?></h3>
            </div></a>
          </article>
        
        <?php endwhile; ?>
        </div>
        <?php else : endif; wp_reset_query(); ?>
        
        
        <?php query_posts(array( 
        'post_type' => 'services',
        'showposts' => -1,
        'orderby'   => 'rand',
        'order'     => 'ASC',
        ));  
        ?>
        <div class="service-list">
        <?php if ( have_posts() ) : ?>
        <ul>
        <?php while (have_posts()) : the_post(); ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
        <?php else : endif; wp_reset_query(); ?>
        
      <a href="<?php echo get_site_url(); ?>/services" class="button primary">View all Services</a>
      </div>
    </div>
  </div>
</section>

<section class="home_cta">  
  <div class="cta_bg" style="background: url('<?php echo $ctaBG['url'] ?>') center center no-repeat; background-size: cover;"></div>
  <div class="cta_content cta_slider">
    <?php if( have_rows('slide_content') ): while ( have_rows('slide_content') ) : the_row(); ?>
      <div class="slide">
        <div class="content">
          <h3><?php the_sub_field('title'); ?></h3>
          <?php the_sub_field('content'); ?>
          <?php $link = get_sub_field('button_link'); $link_url = $link['url']; ?>
          <a href="<?php echo $link_url; ?>" class="button secondary reversed"><?php the_sub_field('button_text'); ?></a>
        </div>
      </div>
    <?php endwhile; else : endif; ?>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>