<?php /* Services Archive */
get_header(); 
?>

<section class="hero small">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h1>Tank orders</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div class="basic_filters">
        <h2>Find out more about our product ranges:</h2>
        <a href="<?php echo get_site_url(); ?>/tanks/?type=12&&tank_width=" class="button primary bunded">Bunded tanks</a>
        <a href="<?php echo get_site_url(); ?>/tanks/?type=13&&tank_width=" class="button primary fuel">Fuel dispensers</a>
        <a href="<?php echo get_site_url(); ?>/tanks/?type=14&&tank_width=" class="button primary enviroblu">Enviroblu tanks</a>
      </div>
    </div>
  </div>
</section>

<section class="post tank_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="main_content">
        <div class="twelve columns grid">
          <?php 
    
            $queryType = $_GET['type'];
            $width = $_GET['tank_width'];
            $price = $_GET['price'];
            
            query_posts(array( 
              'post_type' => 'tanks',
              'showposts' => -1,
              'orderby'   => 'title',
              'order'     => 'ASC',
              'meta_query' => array(
                'relation' => 'AND',
                array(
                  'taxonomy' => 'types',
                  'value'   => $queryType,
                  'compare' => '=',
                ),
                array(
                  'meta_key' => 'tank_width',
                  'value' => $width,
                  'compare' => '='
                ),
                array(
                  'meta_key' => 'basic',
                  'value' => $price,
                  'compare' => '='
                )
              )
            ));  
          ?>
          
          <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          
          <?php 
          // Tank Details
          $type = get_field('type');
          $size = get_field('size');
          $name = get_field('name');
          // Price
          $basic = get_field('basic');
          $full = get_field('full_spec');
          $request = get_field('price_on_request');
          // Capacity
          $brimful = get_field('brimful');
          $nominal = get_field('nominal');
          // Dimensions
          $length = get_field('length');
          $width = get_field('width');
          $height = get_field('height');
          $footprint = get_field('footprint');
          $tankWidth = get_field('tank_width');
          ?>
          
          <article class="<?php $term = get_term( $type ); echo $term->slug; ?> <?php echo $size; ?>">
            
            <a href="<?php the_permalink(); ?>">
            <div class="image">
              <?php the_post_thumbnail('featured-img'); ?>
            </div>
            </a>
            
            <div class="heading">
              
              <div class="name">
                <?php echo $tankWidth; ?><?php echo $size; ?> <?php echo $name; ?>
              </div>
              
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
              
            </div>
            <div class="content">
              
              <div class="litres">
                <div class="brimful"><?php echo $brimful; ?> litres<span class="info">Brimful</span></div>
                <div class="nominal"><?php echo $nominal; ?> litres<span class="info">Nominal</span></div>
              </div>
              
              <div class="size">
                <div class="length"><?php echo $length; ?>mm<span class="info">Length</div>
                <div class="width"><?php echo $width; ?>mm<span class="info">Width</div>
                <div class="height"><?php echo $height; ?>mm<span class="info">Height</div>
              </div>
              
              <div class="footprint">
                <?php echo $footprint; ?>mm <span class="info">Footprint</span>
              </div>
              
              <a href="<?php the_permalink(); ?>" class="button primary">View product</a>
            
            </div>
          </article>

          
          <?php endwhile; ?>
        </div>
        <?php else : ?>
        <div class="no_match">
          <h3>No results found</h3>
          <p>There are no matching Tanks based on your search filters.</p>
          <p><a href="<?php echo get_site_url(); ?>/tanks/" class="button primary">Reset filters</a></p>
        
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<section id="archive-filters">
  <div class="container">

    	<div class="three columns filter" data-filter="type">
      	<h3>Product type</h3>
      	<select id="type">
        	<option value="">All</option>
        	<option value="12">Bunded tanks</option>
          <option value="13">Fuel dispensers</option>
          <option value="14">Enviroblu tanks</option>
      	</select>
    	</div>
      <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
          $( "#price-range" ).slider({
            range: true,
            min: 0,
            max: 1500,
            step: 50,
            values: [ 0, 1500 ],
            slide: function( event, ui ) {
              $( "#min" ).val( "£" + ui.values[ 0 ])
              $( "#max" ).val( "£" + ui.values[ 1 ] );
            }
          });
          $( "#min" ).val( "£" + $( "#price-range" ).slider( "values", 0 ) );
          $( "#max" ).val( "£" + $( "#price-range" ).slider( "values", 1 ) );
        } );
        </script>
  
    	<div class="three columns filter" data-filter="price">
      	<h3>Price</h3>
      	<input type="text" id="min">
      	<input type="text" id="max">
      	<!-- <span class="zero">0</span> <span class="max">£1500</span> -->
        <!-- <input type="range" name="points" min="0" max="1500"> -->
        <div id="price-range"></div>
    	</div>
    	
    	<script>
        $( function() {
          $( "#size-range" ).slider({
            range: true,
            min: 0,
            max: 1300,
            step: 50,
            values: [ 0, 1500 ],
            slide: function( event, ui ) {
              $( "#min-size" ).val( ui.values[ 0 ])
              $( "#max-size" ).val( ui.values[ 1 ] );
            }
          });
          $( "#min-size" ).val( $( "#size-range" ).slider( "values", 0 ) );
          $( "#max-size" ).val( $( "#size-range" ).slider( "values", 1 ) );
        } );
        </script>

    	
    	<div class="three columns filter" data-filter="size">
      	<h3>Size</h3>
      	<input type="text" id="min-size" readonly>
      	<input type="text" id="max-size" readonly>
        <div id="size-range"></div>
    	</div>
    	
    	<div class="three columns filter" data-filter="tank_width">
      	<h3>Tank width</h3>
    		<label><input type="radio" id="acf-field_5ddd521d44226" name="tank_width" value="slimline">Slimline</label>
    		<label><input type="radio" id="acf-field_5ddd521d44226" name="tank_width" value="horizontal">Horizontal</label>
    	</div>

  </div>
</section>

<script type="text/javascript">
(function($) {

  // Construct URL object using current browser URL
  var url = new URL(document.location);

  // Get query parameters object
  var params = url.searchParams;

  // Get value
  var type = params.get("type");
  var width = params.get("tank_width");

  // Set it as the dropdown value
  $("#type").val(type);
  
  $("input[name='tank_width']").each(function(index, elem) {
    var $radio = $(elem);
    if ($radio.val() === width) {
      $radio.prop("checked", true);
      return false;
    }
  });

	
	// change
	$('#archive-filters').on('change', '.filter' , function(){
		// vars
		var url = '<?php echo home_url('tanks'); ?>';
			args = {};
		
		// loop over filters
		$('#archive-filters .filter').each(function(){
			// vars
			var filter = $(this).data('filter'),
				vals = [];
			// find checked inputs
			$(this).find('input[selected]').each(function(){
				vals.push( $(this).val() );
			});
			
			// find checked inputs
			$(this).find('#min').each(function(){
				vals.push( $(this).val() );
			});
			
			$(this).find('input[type=radio]:checked').each(function(){
				vals.push( $(this).val() );
			});
			
      // find checked inputs
			$(this).find('select').each(function(){
				vals.push( $(this).val() );
			});
			
			// append to args
			args[ filter ] = vals.join(',');
			
		});
		
		// update url
		url += '?';
		
		// loop over args
		$.each(args, function( name, value ){
			url += name + '=' + value + '&';
		});
		
		// remove last &
		url = url.slice(0, -1);
		
		// reload page
		window.location.replace( url );

	});

})(jQuery);
</script>

<?php get_footer(); ?>