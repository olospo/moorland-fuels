<?php get_header(); /* Activity Post */ ?>

<section class="post single_tank">
  <div class="container flex">
    <aside class="three columns">
      <a href="<?php echo get_site_url(); ?>/tanks/" class="back">< Back to all tanks</a>
      <a href="<?php echo get_site_url(); ?>/tanks/?type=12" class="button primary bunded">Bunded tanks</a>
      <a href="<?php echo get_site_url(); ?>/tanks/?type=13" class="button primary fuel">Fuel dispensers</a>
      <a href="<?php echo get_site_url(); ?>/tanks/?type=14" class="button primary enviroblu">Enviroblu tanks</a>
      <?php get_template_part('inc/help'); ?>
    </aside>
    <div class="content nine columns extra_gutter">

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
          <div class="post_image">
            <?php the_post_thumbnail('large-thumb'); ?>
          </div>

          <div class="details">
            <div class="content">
              <div class="range">Product range: <?php echo $term->name // echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>'; ?></div>
              <div class="name"><?php echo $size; ?> <?php echo $name; ?></div>

              <div class="price">
                <?php if ($request == '1') { // Price on request ?>
                <div class="cost single"><span class="info">Price on request</span>£ -</div>
                <?php } else { ?>
                  <?php if($full && $basic) { ?>
                  <div class="cost double"><span class="info">Basic</span>£<?php echo $basic; ?></div>
                  <div class="cost double"><span class="info">Full spec</span>£<?php echo $full; ?></div>
                  <?php } else { ?> 
                  <div class="cost single"><span class="info">Full spec</span>£<?php echo $full; ?></div>
                  <?php } ?>
                <?php } ?>
              </div>

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
              
              <a href="#popup" class="button primary">Enquire about product</a>
            
            </div>
          </div>
        </article>

        <div class="extra">
        <?php if( have_rows('extra_content') ): ?>
        
        <div class="extra_sidebar one-third column">
          <ul class="content_menu">
          <?php $i = 1; while( have_rows('extra_content') ): the_row(); 

      		// vars
          $header = get_sub_field('header')
      		?>
          <li><a href="#" class="link<?php echo $i; ?>"><?php echo $header; ?></a></li>

          <?php $i++; endwhile; ?>
          </ul>
	      </div>
        <?php endif; ?>
        
        <?php if( have_rows('extra_content') ): ?>
        <div class="extra_content two-thirds column">
          <?php $i = 1; while( have_rows('extra_content') ): the_row(); 

      		// vars
          $header = get_sub_field('header');
      		$content = get_sub_field('content');
      		$uploads = get_sub_field('uploads');
      
      		?>
          <div class="toggle-item-link<?php echo $i; ?>">
    			
          <h3><?php echo $header; ?></h3>
          <?php echo $content; ?>
          <?php if( $uploads ): ?>
    				<p>Uploads</p>
    			<?php endif; ?>
          </div>
          
          <?php $i++; endwhile; ?>

	      </div>
        <?php endif; ?>
        </div>
    </div>
  </div>
</section>

<script>
$('[class^=toggle-item]').hide();
$('.toggle-item-link1').show();
$('[class^=link]').addClass("non-active");
$('.link1').removeClass("non-active");

$('[class^=link]').click(function() {
  
  $("ul.content_menu li a").addClass("non-active");
  $(this).removeClass("non-active");
  
  $('[class^=toggle-item]').hide();
  $('.toggle-item-' + this.className).toggle();
  
});
</script>

<?php get_template_part( 'inc/popup' ); ?>

<section class="related_products">
  <div class="container">
  <h2>Related Products</h2>
  <div class="twelve columns grid">
    <?php $currentID = get_the_ID(); $type = get_field('type');
    $args = array(
      'post_type'  => 'tanks',
      'showposts'  => 3,
      'post__not_in' => array($currentID),
      'meta_query' => array(
        array(
          'taxonomy' => 'types',
          'value'   => $type,
          'compare' => '=',
        ),
      )
    );
   
  $related = new wp_query( $args );
 
  while( $related->have_posts() ) { $related->the_post(); ?>

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
  
  <?php } wp_reset_query(); ?>
  </div>
</section>

<?php get_footer(); ?>