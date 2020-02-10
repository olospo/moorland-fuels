<?php /* Header */  ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php bloginfo('name'); ?><?php wp_title( '|', true, 'left' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, minimal-ui" />
<?php wp_head(); ?>
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png"/>
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/img/favicon-32x32.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/img/favicon-16x16.png"/>
<?php if( get_field('social_metadata', 'options') ): the_field('social_metadata', 'options'); endif; // Social Metadata ?>
<?php if( get_field('google_analytics', 'options') ): the_field('google_analytics', 'options'); endif; // Google Analytics Code ?>
<meta name="google-site-verification" content="OnoVmuGmDEHfWEFYL1JciAPoXOp9tRBvFnc4xMpg8lI" />
</head>
<body <?php body_class(); ?>>
<div class="fixed_header">
<header>
  <div class="container"> 
    <div class="logo three columns">  
      <?php if ( is_front_page() ) { echo '<h1 class="site-title">'; } else { echo '<p class="site-title">'; } ?>
      <a href="<?php echo get_site_url(); ?>">
        <img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="Moorland Fuels Logo" class="des">
        <img src="<?php bloginfo('template_directory'); ?>/img/mobile_logo.svg" alt="Moorland Fuels Logo" class="mob">
      </a>
      <?php if ( is_front_page() ) { echo '</h1>'; } else { echo '</p>'; } ?>
    </div>
    <!-- Mobile Menu Trigger -->
    <a class="menu-toggle mobile_menu" aria-controls="primary-menu">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </a>
    <!-- Main Menu -->
    <nav class="primary nine columns">
      <ul class="extra">
        <li class="quote"><a href="<?php the_field('order_quote_link','option'); ?>" target="_blank">Order or get a quote</a></li><li class="login"><a href="<?php the_field('log_in_link','option'); ?>" target="_blank">Log in</a></li>
      </ul>
      <?php wp_nav_menu( array( 'theme_location' => 'main', 'container'=> false, 'menu_class'=> false ) ); ?>
    </nav>
  </div>
</header>
</div>
<!-- Mobile Menu -->
<nav class="mobile">
  <?php wp_nav_menu( array( 'theme_location' => 'mobile_main' ) ); ?>
  <div class="facebook">
    <a href="<?php the_field('facebook_link','options'); ?>" class="fb">Follow us on Facebook</a>
  </div>
</nav>