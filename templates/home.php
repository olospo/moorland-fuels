<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<?php if( have_rows('quick_links') ): ?>
<section class="quick_links">
  <div class="container">
	<?php while( have_rows('quick_links') ): the_row(); 
    $post_object = get_sub_field('link'); if( $post_object ): 
    	// override $post
    	$post = $post_object;
    	setup_postdata( $post ); 
    
      get_template_part( 'inc/article' );
    
    wp_reset_postdata(); ?>
    <?php endif; ?>
	<?php endwhile; ?>

	</div>
</section>
<?php endif; ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>