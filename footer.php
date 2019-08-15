<?php /* Footer */ ?>
<section class="quick-links">
  <div class="container">
    <?php if( have_rows('quick_link_one','options') ): ?>
    <div class="quick blue slide_one one-third column">
    	<?php while( have_rows('quick_link_one','options') ): the_row(); 
    		// vars
    		$imageOne = get_sub_field('image_one','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link','options');
    		$linkText = get_sub_field('button_text','options');
    		
    		// thumbnail
      	$size = 'featured-img';
      	$thumb = $imageOne['sizes'][ $size ];
      	$width = $imageOne['sizes'][ $size . '-width' ];
      	$height = $imageOne['sizes'][ $size . '-height' ];
    
    		?>
    		<article>
          <img src="<?php echo $thumb; ?>" />
          <div class="content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button"><?php echo $linkText; ?></a>
          </div>
        </article>
    	<?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
    
    <?php if( have_rows('quick_link_two','options') ): ?>
    <div class="quick red slide_two one-third column">
    	<?php while( have_rows('quick_link_two','options') ): the_row(); 
    		// vars
    		$imageTwo = get_sub_field('image_two','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link','options');
    		$linkText = get_sub_field('button_text','options');
    		
    		// thumbnail
      	$size = 'featured-img';
      	$thumb = $imageTwo['sizes'][ $size ];
      	$width = $imageTwo['sizes'][ $size . '-width' ];
      	$height = $imageTwo['sizes'][ $size . '-height' ];
    
    		?>
    		<article>
          <img src="<?php echo $thumb;  ?>" />
          <div class="content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button"><?php echo $linkText; ?></a>
          </div>
        </article>
    	<?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
    
    <?php if( have_rows('quick_link_three','options') ): ?>
    <div class="quick green slide_three one-third column">
    	<?php while( have_rows('quick_link_three','options') ): the_row(); 
    		// vars
    		$imageThree = get_sub_field('image_three','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link','options');
    		$linkText = get_sub_field('button_text','options');
    		
        // thumbnail
      	$size = 'featured-img';
      	$thumb = $imageThree['sizes'][ $size ];
      	$width = $imageThree['sizes'][ $size . '-width' ];
      	$height = $imageThree['sizes'][ $size . '-height' ];
    
    		?>
    		<article>
          <img src="<?php echo $thumb; ?>" />
          <div class="content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button"><?php echo $linkText; ?></a>
          </div>
        </article>
    	<?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>

  </div>
</section>

<section class="newsletter">
  <div class="container">
    <h3>Sign up to our newsletter</h3>
    <!-- Begin Mailchimp Signup Form -->

    <!--End mc_embed_signup-->
  </div>
</section>

<section class="enquiry">
  <div class="container">
    
  </div>
</section>

<footer>
  <div class="container">
    <div class="about six columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/logo-footer.svg" />
    </div>
  
    <div class="contactsix columns">
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
    </div>
  </div>
</footer>
<a href="#" class="back_to_top">Back to Top</a>
<?php wp_footer(); ?>
</body>
</html>