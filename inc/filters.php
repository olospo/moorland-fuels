<section id="archive-filters">
  <div class="container">

    	<div class="filter filter_type" data-filter="type">
      	<h3>Product type</h3>
      	<select id="type">
        	<option value="">All</option>
        	<option value="12">Bunded tanks</option>
          <option value="13">Fuel dispensers</option>
          <option value="14">Enviroblu tanks</option>
      	</select>
    	</div>
    	

        <script> 
        $( function() {
          
          // Construct URL object using current browser URL
          var url = new URL(document.location);

          // Get query parameters object
          var params = url.searchParams;
          
          var low = params.get("min-price");
          var high = params.get("max-price");

          $( "#price-range" ).slider({
            range: true,
            min: 0,
            max: 1500,
            step: 100,
            values: [ 0, 1500 ],
            slide: function( event, ui ) {
              $( "#price-min-input" ).val(ui.values[ 0 ] );
              $( "#price-max-input" ).val(ui.values[ 1 ] );
            }
          });
          
          if (low) {
            $( "#price-min-input" ).val(low);
            $( "#price-range" ).slider( "values", 0, low );
          } else {
            $("#price-min-input").val(0);  
          }
          
          if (high) {
            $( "#price-max-input" ).val(high);
            $( "#price-range" ).slider( "values", 1, high );
          } else {
            $("#price-max-input").val(1500);
          }
          
          var lowS = params.get("min-size");
          var highS = params.get("max-size");
          
          $( "#size-range" ).slider({
            range: true,
            min: 0,
            max: 8050,
            step: 50,
            values: [ 0, 8050 ],
            slide: function( event, ui ) {
              $( "#size-min-input" ).val( ui.values[ 0 ] );
              $( "#size-max-input" ).val( ui.values[ 1 ] );
            }
          });

          if (lowS) {
            $( "#size-min-input" ).val(lowS);
            $( "#size-range" ).slider( "values", 0, lowS );
          } else {
            $("#size-min-input").val(0);  
          }
          
          if (highS) {
            $( "#size-max-input" ).val(highS);
            $( "#size-range" ).slider( "values", 1, highS );
          } else {
            $("#size-max-input").val(8050);
          }
          
        } );
        </script>
  
    	<div class="filter_price">
      	<h3>Price</h3>
      	<div class="input-group-price filter" data-filter="min-price"><div class="input-group-prepend"><span class="input-group-text">£</span></div><input type="text" id="price-min-input" readonly></div>
      	<div class="input-group-price filter" data-filter="max-price"><div class="input-group-prepend-right"><span class="input-group-text">£</span></div><input type="text" id="price-max-input" readonly></div>
        <div id="price-range"></div>
    	</div>
    	
    	<div class="filter_size">
      	<h3>Size</h3>
      	<div class="input-group-size filter" data-filter="min-size"><input type="text" id="size-min-input" readonly></div>
      	<div class="input-group-size filter" data-filter="max-size"><input type="text" id="size-max-input" readonly></div>
        <div id="size-range"></div>
    	</div>
    	
    	<div class="filter filter_width" data-filter="tank-width">
      	<h3>Tank width</h3>
      	<ul>
          <li>
            <input type="radio" id="slimline" name="tank-width" value="slimline">
            <label for="slimline">Slimline</label>
            <div class="check"></div>
          </li>
          <li>
            <input type="radio" id="horizontal" name="tank-width" value="horizontal">
            <label for="horizontal">Horizontal</label>
            <div class="check"></div>
          </li>
      	</ul>
    	</div>
    	
    	
    	<div class="filter_buttons">
    	  <a href="#" class="filter_submit button primary">Filter</a>
        <a href="<?php echo get_site_url(); ?>/tanks/" class="reset">Reset filters</a>
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
  var width = params.get("tank-width");

  // Set it as the dropdown value
  $("#type").val(type);

  $("input[name='tank-width']").each(function(index, elem) {
    var $radio = $(elem);
    if ($radio.val() === width) {
      $radio.prop("checked", true);
      return false;
    }
  });
	
	// change
	$('#archive-filters').on('click', '.filter_submit' , function(){
  	
  	$(this).text("Loading...");
		// vars
		var url = '<?php echo home_url('tanks'); ?>';
			args = {};
		
		// loop over filters
		$('#archive-filters .filter').each(function(){
  		
  		
  		
  		
			// vars
			var filter = $(this).data('filter'),
				vals = [];
			// find checked inputs

			
			// find checked inputs
			$(this).find('#price-min-input').each(function(){
				vals.push( $(this).val() );
			});
			
			// find checked inputs
			$(this).find('#price-max-input').each(function(){
				vals.push( $(this).val() );
			});
			
			// find checked inputs
			$(this).find('#size-min-input').each(function(){
				vals.push( $(this).val() );
			});
			
			// find checked inputs
			$(this).find('#size-max-input').each(function(){
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