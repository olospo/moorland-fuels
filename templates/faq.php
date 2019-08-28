<?php /* Template name: FAQ */
get_header(); ?>

<section class="hero small faq">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <?php $parent = get_post($post->post_parent); ?>
      <h1><?php echo $parent->post_title; ?></h1>
      <?php echo $parent->post_content;?>
    </div>
  </div>
</section>

<section class="faq_topics">
  <div class="container">
    <div class="twelve columns">
      <?php $current_post = $post->ID;
              query_posts(array( 
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $post->post_parent,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
              ));  
            ?>
          <ul class="topics">
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?><li <?php if( $current_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><?php endwhile; ?>
          </ul>
          <?php else : endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<section class="faq_listing">
  <div class="container flex">
    <aside class="three columns">
      <?php get_template_part('inc/help'); ?>
    </aside>
    <div class="nine columns extra_gutter">
      <?php if( have_rows('topic_faqs') ): 
        while( have_rows('topic_faqs') ): the_row(); 
          // vars
          $question = get_sub_field('question');
          $answer = get_sub_field('answer');
  		?>
  		<div class="tab">
        <div class="accordionItem close">
          <h3 class="accordionItemHeading">
            <div class="content"><?php echo $question; ?></div>
          </h3>
          <div class="accordionItemContent">
            <div class="content">
              <?php echo $answer; ?>        
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; endif; ?>  
    </div>
  </div>
</section>

<?php get_footer(); ?>