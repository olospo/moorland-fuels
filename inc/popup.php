<?php 
/**
 * Change a field's settings when localized to the page.
 *
 * @param array $field [ id, settings => [ type, key, label, etc. ] ]
 * @return array $field
 */
 
add_filter( 'ninja_forms_render_default_value', 'my_change_nf_default_value', 10, 3 );
function my_change_nf_default_value( $default_value, $field_type, $field_settings ) {
  
  
  $type = get_field('type');
  $term = get_term( $type ); 
  $tanktype = $term->name;
  
  
  $size = get_field('size');
  $name = get_field('name');
  $tank = $tanktype . ' ' . $size . ' ' . $name;
  
  if( 'Tank' == $default_value ){
    $default_value = $tank;
  }
  return $default_value;
} ?>

<section id="popup" class="overlay">
	<div class="form_popup">
		<h2>Product enquiry</h2><a class="close" href="#">&times;</a>
		<div class="content">
			<?php echo do_shortcode('[ninja_form id=3]'); ?>
		</div>
	</div>
</section>