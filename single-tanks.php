<?php get_header(); /* Activity Post */ ?>

<section class="post single_tank">
  <div class="container flex">
    <aside class="three columns">
      <a href="<?php echo get_site_url(); ?>/tanks/">Back to all tanks</a>
      <a href="#" class="button primary bunded">Bunded tanks</a>
      <a href="#" class="button primary fuel">Fuel dispensers</a>
      <a href="#" class="button primary enviroblu">Enviroblu tanks</a>
      <?php get_template_part('inc/help'); ?>
    </aside>
    <div class="content nine columns extra_gutter">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      
      <?php if( have_rows('tank_details') ): while( have_rows('tank_details') ): the_row(); 
          // Tank Details
          $type = get_sub_field('type');
          $size = get_sub_field('size');
          $name = get_sub_field('name'); ?>
          <article class="<?php $term = get_term( $type ); echo $term->slug; ?> <?php echo $size; ?>">
            <a href="<?php the_permalink(); ?>">
            <!-- <div class="image">
              <?php the_post_thumbnail('featured-img'); ?>
            </div> -->
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
              <a href="#" class="button primary">Enquire about product</a>
            
            </div>
          </article>
          <?php endwhile; endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>