<?php // Hero
  $title = get_field('title');
  $heroType = get_field('image_video');
  $image = get_field('background_image');
  $videoType = get_field('upload_or_link');
  $videoLink = get_field('video_link');
  $videomp4 = get_field('upload_video_mp4');
  $videowebm = get_field('upload_video_webm');
  $buttonText = get_field('button_text');
  $buttonLink = get_field('button_link');
?>

<section class="home hero <?php if ( $videoType == 'link' && $heroType == 'video' ): // Video Link ?>video-link<?php endif; ?> <?php if ( $videoType == 'upload' && $heroType == 'video' ): // Video Link ?>upload<?php endif; ?>" style="background: linear-gradient(rgba(0, 0, 0, 0.20), rgba(0, 0, 0, 0.20))<?php if( $heroType == 'image' ): ?>, url(' <?php echo $image['url']; ?> ') center center no-repeat; background-size: cover;<?php endif; ?>">
  <?php if( $heroType == 'video' ): ?>
    <?php if ( $videoType == 'link' ): // Video Link ?>
    <div class="video-area">
      <?php
      // get iframe HTML
      $iframe = get_field('video_link');
      
      // use preg_match to find iframe src
      preg_match('/src="(.+?)"/', $iframe, $matches);
      $src = $matches[1];
      
      // add extra params to iframe src
      $params = array(
        'controls'    => 0,
        'hd'          => 1,
        'autohide'    => 1,
        'autoplay'    => 1,
        'showinfo'    => 0,
        'loop'        => 1,
        'mute'        => 1,
      );
      
      $new_src = add_query_arg($params, $src);
      $iframe = str_replace($src, $new_src, $iframe);
      
      
      // add extra attributes to iframe html
      $attributes = 'frameborder="0"';
      $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
      
      // echo $iframe
      echo $iframe; ?>   
    </div>
    <?php endif; ?>
    <?php if ( $videoType == 'upload' ): // Video Upload ?>
      <div class="video-upload">
        <video muted autoplay preload="auto" loop>
          <source src="<?php echo $videomp4; ?>" type="video/mp4">
          <source src="<?php echo $videowebm; ?>" type="video/webm">
        </video>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <div class="float <?php if( $videoType == 'upload' && $heroType == 'video' ): ?>video<?php endif; ?>">
    <div class="container">
      <div class="content eight columns offset-by-two">
      <h1><?php echo $title; ?></h1>
      <?php if ( $buttonText ): ?>
        <a href="<?php echo $buttonLink; ?>" class="button primary"><?php echo $buttonText; ?></a> 
      <?php endif; ?>
      </div>
    </div>
  </div>
</section>
