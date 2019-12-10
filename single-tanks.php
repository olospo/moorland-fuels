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
        $name = get_field('name'); ?>
        <article class="<?php $term = get_term( $type ); echo $term->slug; ?> <?php echo $size; ?>">
          <div class="post_image">
            <?php the_post_thumbnail('large-thumb'); ?>
          </div>

          <div class="details">
            <div class="content">
              <div class="range">Product range: <?php echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>'; ?></div>
              <div class="name"><?php echo $size; ?> <?php echo $name; ?></div>
              <?php 
              // Price
              $basic = get_field('basic');
              $full = get_field('full_spec');
              $request = get_field('price_on_request'); ?>
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
              <?php 
              // Capacity
              $brimful = get_field('brimful');
              $nominal = get_field('nominal'); ?>
              <div class="litres">
                <div class="brimful"><?php echo $brimful; ?> litres<span class="info">Brimful</span></div>
                <div class="nominal"><?php echo $nominal; ?> litres<span class="info">Nominal</span></div>
              </div>
              
              <?php
              // Dimensions
              $length = get_field('length');
              $width = get_field('width');
              $height = get_field('height');
              $footprint = get_field('footprint');
              $tankWidth = get_field('tank_width'); ?>
              <div class="size">
                <div class="length"><?php echo $length; ?>mm<span class="info">Length</div>
                <div class="width"><?php echo $width; ?>mm<span class="info">Width</div>
                <div class="height"><?php echo $height; ?>mm<span class="info">Height</div>
              </div>
              <div class="footprint">
                <?php echo $footprint; ?>mm <span class="info">Footprint</span>
              </div>
              
              <a href="#" class="button primary">Enquire about product</a>
            
            </div>
          </div>
        </article>
        
        <div class="extra">
        <?php if( have_rows('extra_content') ): ?>
        <div class="extra_sidebar one-third column">
          <ul>
          <?php while( have_rows('extra_content') ): the_row(); 

      		// vars
          $header = get_sub_field('header')
      		?>
          <li><a href="#"><?php echo $header; ?></a></li>

          <?php endwhile; ?>
          </ul>
	      </div>
        <?php endif; ?>
        
        <?php if( have_rows('extra_content') ): ?>
        <div class="extra_content two-thirds column">
          <?php while( have_rows('extra_content') ): the_row(); 

      		// vars
          $header = get_sub_field('header');
      		$content = get_sub_field('content');
      		$uploads = get_sub_field('uploads');
      
      		?>

    			
          <h3><?php echo $header; ?></h3>
          <?php echo $content; ?>
          <?php if( $uploads ): ?>
    				<p>Uploads</p>
    			<?php endif; ?>

          <?php endwhile; ?>

	      </div>
        <?php endif; ?>
        </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>