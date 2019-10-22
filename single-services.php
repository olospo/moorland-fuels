<?php get_header(); /* Activity Post */

// Hero
$icon = get_field('service_icon');

?>

<section class="hero service">
  <div class="background" style="background: url(' <?php the_post_thumbnail_url( 'full' ); ?> ') center center no-repeat; background-size: cover;">
</section>

<section class="post">
  <div class="container flex">
    <aside class="three columns">
      <div class="services-list">
        <div class="content">
          <h3>Our Services</h3>
          <?php $current_post = $post->ID;
              query_posts(array( 
                'post_type' => 'services',
                'showposts' => -1,
                'orderby'   => 'title',
                'order'     => 'ASC',
              ));  
            ?>
          <ul>
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
            <li <?php if( $current_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
          </ul>
          <?php else : endif; wp_reset_query(); ?>
        </div>
      </div>
      <?php get_template_part('inc/help'); ?>
    </aside>
    <div class="content nine columns extra_gutter">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      
      <!-- Tabs -->
      <?php if( have_rows('tab') ): ?>
        <div class="tab">
          <?php while( have_rows('tab') ): the_row(); 
      		// vars
      		$tabHeader = get_sub_field('tab_header');
      		$tabContent = get_sub_field('tab_content');
      		?>
      		<div class="accordionItem close">
            <h3 class="accordionItemHeading"><?php echo $tabHeader; ?></h3>
            <div class="accordionItemContent">
              <?php // check if the flexible content field has rows of data
              if( have_rows('tab_content') ):
                while ( have_rows('tab_content') ) : the_row();
              
                  if( get_row_layout() == 'content' ):
              
                    the_sub_field('content');
              
                  elseif( get_row_layout() == 'image' ):
                    
                    // display a sub field value
                    $image = get_sub_field('image'); 
                        
                    // thumbnail
                    $size = 'featured-img';
                    $thumb = $image['sizes'][ $size ];
                    $width = $image['sizes'][ $size . '-width' ];
                    $height = $image['sizes'][ $size . '-height' ];
                    ?>
                            
                    <img src="<?php echo $thumb; ?>" />
                        
                  <?php

                    endif;
              
                endwhile;
            
              else :
                // no layouts found
              endif; ?>
            </div>
          </div>

      	  <?php endwhile; ?>
        </div>
        <?php endif; ?>
        
        <!-- Related Info/Documents -->
        <?php if( have_rows('related_info_documents') ): ?>
        <div class="related">
          <div class="content">
          <h3>More information</h3>
          <ul>
          <?php while( have_rows('related_info_documents') ): the_row(); 

      		// vars
      		$select = get_sub_field('url_or_upload');
      		$title = get_sub_field('title');
      		$url = get_sub_field('url');
      		$upload = get_sub_field('upload');
      		
      		$ext = pathinfo($upload, PATHINFO_EXTENSION);
      
      		?>
      		
      		<?php if( $select == 'url' ): ?>
          <li class="link">
            <a href="<?php echo $url; ?>" target="_blank">
              <?php echo $title; ?>
				    </a>
          </li>
          <?php endif; ?>
          
          <?php if( $select == 'upload' ): ?>
          <li class="<?php echo $ext; ?>">
            <a href="<?php echo $upload; ?>">
              <?php echo $title; ?>
				    </a>
          </li>
          <?php endif; ?>

      	  <?php endwhile; ?>
      	  </ul>
        </div>
        <?php endif; ?> 
    </div>
  </div>
</section>

<?php get_footer(); ?>