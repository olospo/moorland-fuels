<?php /* Services Archive */
get_header(); 

$queryType = $_GET['type'];
$width = $_GET['tank-width'];
$min = $_GET['min-price'];
$max = $_GET['max-price'];
$lowSize = $_GET['min-size'];
$highSize = $_GET['max-size'];

?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1>Tank service</h1>
      <p>Moorland Fuels can supply a range of Envirostore fuel tanks for domestic, agricultural and commercial use throughout the United Kingdom. We offer delivery within 7 working days and can provide next day delivery if the order is placed before 10:30 a.m. The Envirostore range of tanks comes with a 10 year warranty and a 20 year life expectancy.</p>
      <p>Live in Devon or East Cornwall and need your oil tank installed? Call us for a competitive quote from our OFTEC-registered engineers.</p>
      <div class="basic_filters">
        <h2>Find out more about our product ranges:</h2>
        <a href="<?php echo get_site_url(); ?>/bunded-tanks" class="button primary bunded">Bunded tanks</a>
        <a href="<?php echo get_site_url(); ?>/fuel-dispensers" class="button primary fuel">Fuel dispensers</a>
        <a href="<?php echo get_site_url(); ?>/enviroblu-tanks" class="button primary enviroblu">Enviroblu tanks</a>
      </div>
    </div>
  </div>
</section>

<section class="post tank_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="main_content">
        <?php if ( isset( $min ) OR isset( $max ) OR isset( $lowSize ) OR isset( $highSize ) ) {
            $query_args = array(
              'post_type'  => 'tanks',
              'showposts'  => -1,
              'orderby'   => 'meta_value_num',
              'order'      => 'ASC',
              'meta_key' => 'size',
              'meta_query' => array(
                'relation' => 'AND',
                array(
                  'taxonomy' => 'types',
                  'value'   => $queryType,
                  'compare' => '=',
                ),
                array(
                  'taxonomy' => 'tank_width',
                  'value'   => $width,
                  'compare' => '=',
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'basic',
                    'value' => array($min, $max),
                    'type'     => 'numeric',
                    'compare' => 'BETWEEN'
                  ),
                  array(
                    'key' => 'full_spec',
                    'value' => array($min, $max),
                    'type'     => 'numeric',
                    'compare' => 'BETWEEN'
                  ),
                  array(
                    'key' => 'price_on_request',
                    'value' => 1,
                    'type'     => 'numeric',
                    'compare' => '='
                  ),
                ),
                array(
                  'relation' => 'OR',
                  array(
                    'key' => 'full_spec',
                    'value' => array($min, $max),
                    'type'     => 'numeric',
                    'compare' => 'BETWEEN'
                  ),
                  array(
                    'key' => 'basic',
                    'value' => '',
                    'compare' => '!=',
                  ),
                  array(
                    'key' => 'price_on_request',
                    'value' => 1,
                    'type'     => 'numeric',
                    'compare' => '='
                  ),
                ),
                array(
                  'key' => 'size',
                  'value' => array($lowSize, $highSize),
                  'type'     => 'numeric',
                  'compare' => 'BETWEEN'
                ),
                array (
                  'key' => 'size',
                  'orderby'   => 'value',
                  'order'      => 'ASC',
                )
              )
            );
            } else {
            $query_args = array(
              'post_type'  => 'tanks',
              'showposts'  => -1,
              'orderby'   => 'meta_value_num',
              'order'      => 'ASC',
              'meta_key' => 'size',
              'meta_query' => array(
                'relation' => 'AND',
                array(
                  'taxonomy' => 'types',
                  'value'   => $queryType,
                  'compare' => '=',
                ),
                array(
                  'taxonomy' => 'tank_width',
                  'value'   => $width,
                  'compare' => '=',
                ),
                array (
                  'key' => 'size',
                  'orderby'   => 'value',
                  'order'      => 'ASC',
                )
              )
              );
            } query_posts( $query_args );
        ?> 
        <div class="product_count six columns">
          <p>Showing <?php echo $wp_query->found_posts ?> of <?php wp_reset_query(); echo $wp_query->found_posts ?> products</p>
        </div>
        <div class="product_order six columns">
          <p>Products are ordered in ascending size</p>
        </div>
        
        <div class="twelve columns grid">
          
          <?php query_posts( $query_args );  if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          
          <?php 
          // Tank Details
          $type = get_field('type');
          $size = get_field('size');
          $name = get_field('name');
          // Price
          
          $basic = get_field('basic');

          $full = get_field('full_spec');
          $request = get_field('price_on_request');
          // Capacity
          $brimful = get_field('brimful');
          $nominal = get_field('nominal');
          // Dimensions
          $length = get_field('length');
          $width = get_field('width');
          $height = get_field('height');
          $lid_height = get_field('lid_height');
          $height_to_lid = get_field('height_to_lid');
          $footprint = get_field('footprint');
          $tankWidth = get_field('tank_width');
          ?>
          
          <article class="<?php $term = get_term( $type ); echo $term->slug; ?> <?php echo $size; ?>">
            <a href="<?php the_permalink(); ?>">
            <div class="image">
              <div class="type <?php $term = get_term( $type ); echo $term->slug; ?> ">
              <?php $term = get_term( $type ); echo $term->name; ?>
              </div>
              <?php the_post_thumbnail('featured-img'); ?>
            </div>
            </a>
            
            <div class="heading">
              
              <div class="name"><?php echo $size; ?> <?php echo $name; ?></div>
              
              <div class="price">
                <?php if ($request == '1') { // Price on request ?>
                <div class="cost single"><span class="info">On request</span>£ -</div>
                <?php } else { ?>
                  <?php if($full AND $basic) { ?>
                  <div class="cost double"><span class="info">Full spec</span>£<?php echo $full; ?></div>
                  <div class="cost double"><span class="info">Basic</span>£<?php echo $basic; ?></div>
                  <?php } else {  ?>
                  <div class="cost single"><span class="info">Full spec</span>£<?php echo $full; ?></div>
                  <?php } ?>
                <?php }  ?>
              </div>
              
            </div>
            <div class="content">
              
              <div class="litres">
                <div class="brimful"><span class="value"><?php echo $brimful; ?> litres</span><span class="info">Brimful</span></div>
                <div class="divide"></div>
                <div class="nominal"><span class="value"><?php echo $nominal; ?> litres</span><span class="info">Nominal</span></div>
              </div>
              
              <div class="size">
                <div class="length">
                  <?php echo $length; ?>mm
                  <span class="info">Length</span>
                </div>
                <div class="width">
                  <?php echo $width; ?>mm
                  <span class="info">Width</span>
                </div>
                <div class="height">
                  <?php echo $height; ?>mm
                  <span class="info">Height</span>
                  <?php if ($lid_height == '1') { // Lid Height ?>
                  <span class="lid_height">(<?php echo $height_to_lid; ?>mm to lid)</span>
                  <?php } ?>
                </div>
              </div>
              
              <div class="footprint">
                <?php echo $footprint; ?>mm <span class="info">Footprint</span>
              </div>
              
              <a href="<?php the_permalink(); ?>" class="button primary">View product</a>
            
            </div>
          </article>

          <?php endwhile; ?>
        </div>
        <?php else : ?>
        <div class="no_match">
          <h3>No results found</h3>
          <p>There are no matching Tanks based on your search filters.</p>
          <p><a href="<?php echo get_site_url(); ?>/tanks/" class="button">Reset filters</a></p>
        </div>
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('inc/filters'); ?>

<?php get_footer(); ?>