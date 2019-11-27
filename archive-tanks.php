<?php /* Services Archive */
get_header(); 
?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1>Tank orders</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div class="basic_filters">
        <h2>Find out more about our product ranges:</h2>
        <a href="#" class="button primary bunded">Bunded tanks</a>
        <a href="#" class="button primary fuel">Fuel dispensers</a>
        <a href="#" class="button primary enviroblu">Enviroblu tanks</a>
      </div>
    </div>
  </div>
</section>

<section class="post tank_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="main_content">
        <div class="twelve columns grid">
          <?php 
            query_posts(array( 
              'post_type' => 'tanks',
              'showposts' => -1,
              'orderby'   => 'title',
              'order'     => 'ASC',
            ));  
          ?>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); 
            
            

          ?>
          
          <?php if( have_rows('tank_details') ): while( have_rows('tank_details') ): the_row(); 
          // Tank Details
          $type = get_sub_field('type');
          $size = get_sub_field('size');
          $name = get_sub_field('name'); ?>
          <article class="<?php $term = get_term( $type ); echo $term->slug; ?> <?php echo $size; ?>">
            <a href="<?php the_permalink(); ?>">
            <div class="image">
              <?php the_post_thumbnail('featured-img'); ?>
            </div>
            </a>
            <div class="heading">
              <div class="name">
                <?php echo $size; ?> <?php echo $name; ?>
              </div>
              <?php if( have_rows('price') ): while( have_rows('price') ): the_row(); 
              // Price
              $basic = get_sub_field('basic');
              $full = get_sub_field('full_spec');
              $request = get_sub_field('price_on_request'); ?>
              <div class="price">
                <?php if ($request == '1') { // Price on request ?>
                <div class="cost single"><span class="info">On request</span>£ -</div>
                <?php } else { ?>
                  <?php if($full && $basic) { ?>
                  <div class="cost double"><span class="info">Basic</span>£<?php echo $basic; ?></div>
                  <div class="cost double"><span class="info">Full spec</span>£<?php echo $full; ?></div>
                  <?php } else { ?> 
                  <div class="cost single"><span class="info">Full spec</span>£<?php echo $full; ?></div>
                  <?php } ?>
                <?php } ?>
              </div>
              <?php endwhile; endif; ?>
            </div>
            <div class="content">
              <?php if( have_rows('capacity') ): while( have_rows('capacity') ): the_row(); 
              // Capacity
              $brimful = get_sub_field('brimful');
              $nominal = get_sub_field('nominal'); ?>
              <div class="litres">
                <div class="brimful"><?php echo $brimful; ?> litres<span class="info">Brimful</span></div>
                <div class="nominal"><?php echo $nominal; ?> litres<span class="info">Nominal</span></div>
              </div>
              <?php endwhile; endif; ?>
              <?php if( have_rows('dimensions') ): while( have_rows('dimensions') ): the_row(); 
              // Dimensions
              $length = get_sub_field('length');
              $width = get_sub_field('width');
              $height = get_sub_field('height');
              $footprint = get_sub_field('footprint');
              $tankWidth = get_sub_field('tank_width'); ?>
              <div class="size">
                <div class="length"><?php echo $length; ?>mm<span class="info">Length</div>
                <div class="width"><?php echo $width; ?>mm<span class="info">Width</div>
                <div class="height"><?php echo $height; ?>mm<span class="info">Height</div>
              </div>
              <div class="footprint">
                <?php echo $footprint; ?>mm <span class="info">Footprint</span>
              </div>
              <?php endwhile; endif; ?>
              <a href="<?php the_permalink(); ?>" class="button primary">View product</a>
            
            </div>
          </article>
          <?php endwhile; endif; ?>
          
          <?php endwhile; ?>
        </div>
        <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<section class="filter">
  <div class="container">
    <div class="three columns">
      <h3>Product Type</h3>
      <p>All</p>
    </div>
    <div class="three columns">
      <h3>Price</h3>
      <p>£0 - £1500</p>
    </div>
    <div class="three columns">
      <h3>Size</h3>
      <p>0 - 1300</p>
    </div>
    <div class="three columns">
      <h3>Tank Width</h3>
      <p>Slimline - Horizontal</p>
    </div>
  </div>
</section>

<?php get_footer(); ?>