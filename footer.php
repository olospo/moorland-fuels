<?php /* Footer */ ?>
<section class="faq_cta small_cta">
  <div class="container">
    <h3>Couldn’t find an answer to your query?</h3><a href="<?php echo get_site_url(); ?>/faqs" class="button secondary reversed">Visit our FAQs</a>
  </div>
</section>

<section class="quick-links">
  <div class="container">
    <div class="links">
    <?php if( have_rows('quick_link_one','options') ): ?>
    <article class="quick-one three columns">
    	<?php while( have_rows('quick_link_one','options') ): the_row(); 
    		// vars
    		$imageOne = get_sub_field('image_one','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$linkOne = get_sub_field('button_link','options');
    		$linkText = get_sub_field('button_text','options');
    		
    		// thumbnail
      	$size = 'featured-img';
      	$thumbOne = $imageOne['sizes'][ $size ];
      	$width = $imageOne['sizes'][ $size . '-width' ];
      	$height = $imageOne['sizes'][ $size . '-height' ];
    
    		?>
      		<div class="image">
            <a href="<?php echo $linkOne; ?>"><img src="<?php echo $thumbOne; ?>" /></a>
      		</div>
          <div class="content">
            <h3><a href="<?php echo $linkOne; ?>"><?php echo $title; ?></a></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $linkOne; ?>" class="button primary"><?php echo $linkText; ?></a>
          </div>
    	<?php endwhile; ?>
    </article>
    <?php endif; wp_reset_postdata(); ?>
    
    <?php if( have_rows('quick_link_two','options') ): ?>
    <article class="quick-two three columns">
    	<?php while( have_rows('quick_link_two','options') ): the_row(); 
    		// vars
    		$imageTwo = get_sub_field('image_two','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link_two','options');
    		$linkText = get_sub_field('button_text','options');
    		
    		// thumbnail
      	$size = 'featured-img';
      	$thumbTwo = $imageTwo['sizes'][ $size ];
      	$width = $imageTwo['sizes'][ $size . '-width' ];
      	$height = $imageTwo['sizes'][ $size . '-height' ];
    
    		?>
    		
      		<div class="image">
            <a href="<?php echo $link; ?>"><img src="<?php echo $thumbTwo; ?>" /></a>
      		</div>
          <div class="content">
            <h3><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button primary"><?php echo $linkText; ?></a>
          </div>
    	<?php endwhile; ?>
    </article>
    <?php endif; wp_reset_postdata(); ?>
    
    <?php if( have_rows('quick_link_three','options') ): ?>
    <article class="quick-three three columns">
    	<?php while( have_rows('quick_link_three','options') ): the_row(); 
    		// vars
    		$imageThree = get_sub_field('image_three','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link_three','options');
    		$linkText = get_sub_field('button_text','options');
    		
        // thumbnail
      	$size = 'featured-img';
      	$thumbThree = $imageThree['sizes'][ $size ];
      	$width = $imageThree['sizes'][ $size . '-width' ];
      	$height = $imageThree['sizes'][ $size . '-height' ];
    
    		?>
      		<div class="image">
            <a href="<?php echo $link; ?>"><img src="<?php echo $thumbThree; ?>" /></a>
      		</div>
          <div class="content">
            <h3><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button primary"><?php echo $linkText; ?></a>
          </div>
    	<?php endwhile; ?>
    </article>
    <?php endif; wp_reset_postdata(); ?>
    
    <?php if( have_rows('quick_link_four','options') ): ?>
    <article class="quick-four three columns">
    	<?php while( have_rows('quick_link_four','options') ): the_row(); 
    		// vars
    		$imageFour = get_sub_field('image_four','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link_four','options');
    		$linkText = get_sub_field('button_text','options');
    		
        // thumbnail
      	$size = 'featured-img';
      	$thumbFour = $imageFour['sizes'][ $size ];
      	$width = $imageFour['sizes'][ $size . '-width' ];
      	$height = $imageFour['sizes'][ $size . '-height' ];
    
    		?>
      		<div class="image">
            <a href="<?php echo $link; ?>"><img src="<?php echo $thumbFour; ?>" /></a>
      		</div>
          <div class="content">
            <h3><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button primary"><?php echo $linkText; ?></a>
          </div>
    	<?php endwhile; ?>
    </article>
    <?php endif; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<section class="full-width">
  <div class="background"></div>
  <div class="container">
    <div class="newsletter one-half column">
      <h3>Sign up to our newsletter</h3>
      <p>Be the first to receive news about Moorland Fuels, get special offers and keep up to date with all of the goings on.</p>
      <!-- Begin Mailchimp Signup Form -->
      <div id="mc_embed_signup">
      <form action="https://moorlandfuels.us9.list-manage.com/subscribe/post?u=58fc2211c19c35f59472ef4ae&amp;id=64784df0a6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">
      	
      <div class="mc-field-group">
      	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your email address">
      </div>
      	<div id="mce-responses" class="clear">
      		<div class="response" id="mce-error-response" style="display:none"></div>
      		<div class="response" id="mce-success-response" style="display:none"></div>
      	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_58fc2211c19c35f59472ef4ae_64784df0a6" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
          <p class="privacy">Moorland Fuels will use the information that you on provide on this form to keep in touch with you – your data will be processed in accordance with our <a href="<?php echo get_site_url(); ?>/privacy-policy/">Privacy policy</a></p>
      </form>
      </div>
      
      <!--End mc_embed_signup-->
    </div>
    <div class="latest-news one-half column">
      <h3>Latest news</h3>
      <div class="news-slider">
      <?php $args = array('post_type'=> 'post','order' => 'DESC','post_status' => 'publish','posts_per_page'=> 3); query_posts($args); ?>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <article>
            <div class="content">
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="button secondary reversed">Read more</a>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else : endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<section class="enquiry">
  <div class="container">
    <h3>Make an enquiry</h3>
    <div class="mobile"><a class="button primary mobile_enquiry">View form</a></div>
    <?php echo do_shortcode('[ninja_form id=2]'); ?>
  </div>
</section>

<footer>
  <div class="container">
    <div class="about six columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/logo-footer.svg" alt="Moorland Fuels Logo"/>
      <a href="<?php the_field('facebook_link','options'); ?>" class="button primary fb">Follow us on Facebook</a>
    </div>
  
    <div class="contact six columns">
      <h4>Contact us</h4>
      <div class="one-half column">
        <p>Sales: <a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a><br />
          Out of hours: <a href="tel:<?php the_field('out_of_hours_number','options'); ?>"><?php the_field('out_of_hours_number','options'); ?></a><br />
          <a href="mailto:<?php the_field('email','options'); ?>"><?php the_field('email','options'); ?></a>
        </p>
      </div>
      <div class="address one-half column">
        <p><?php the_field('address','options'); ?></p>
      </div>
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
      Company Reg No. 03070843 / VAT No. 712 0979 44
    </div>
  </div>
</footer>
<a href="#" class="back_to_top">Back to Top</a>
<?php wp_footer(); ?>
</body>
</html>