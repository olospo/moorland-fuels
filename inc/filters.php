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
    	
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
          
          // Construct URL object using current browser URL
          var url = new URL(document.location);

          // Get query parameters object
          var params = url.searchParams;
          
          var low = params.get("price-low");
          var high = params.get("price-high");

          $( "#price-range" ).slider({
            range: true,
            min: 0,
            max: 1500,
            step: 50,
            values: [ 0, 1500 ],
            slide: function( event, ui ) {
              console.log("Price From: "+ui.values[0],"To: "+ui.values[1]);
              $( "#min" ).val(ui.values[ 0 ] );
              $( "#max" ).val(ui.values[ 1 ] );
            }
          });
          
          if (low) {
            $( "#min" ).val(low);
            $( "#price-range" ).slider( "values", 0, low );
          } else {
            $("#min").val(0);  
          }
          
          if (high) {
            $( "#max" ).val(high);
            $( "#price-range" ).slider( "values", 1, high );
          } else {
            $("#max").val(1500);
          }
          
        } );
        </script>
  
    	<div class="filter_price">
      	<h3>Price</h3>
      	<div class="input-group-text filter" data-filter="price-low"><input type="text" id="min" readonly></div>
      	<div class="input-group-text filter" data-filter="price-high"><input type="text" id="max" readonly></div>
        <div id="price-range"></div>
    	</div>
    	
    	<script>
        $( function() {
          
          // Construct URL object using current browser URL
          var url = new URL(document.location);

          // Get query parameters object
          var params = url.searchParams;
          
          var lowS = params.get("size-low");
          var highS = params.get("size-high");
          
          $( "#size-range" ).slider({
            range: true,
            min: 0,
            max: 1400,
            step: 50,
            values: [ 0, 1400 ],
            slide: function( event, ui ) {
              console.log("Size From: "+ui.values[0],"To: "+ui.values[1]);
              $( "#min-size" ).val( ui.values[ 0 ] );
              $( "#max-size" ).val( ui.values[ 1 ] );
            }
          });

          if (lowS) {
            $( "#min-size" ).val(lowS);
            $( "#size-range" ).slider( "values", 0, lowS );
          } else {
            $("#min-size").val(0);  
          }
          
          if (highS) {
            $( "#max-size" ).val(highS);
            $( "#size-range" ).slider( "values", 1, highS );
          } else {
            $("#max-size").val(1400);
          }
          
        } );
      </script>
    	
    	<div class="filter_size">
      	<h3>Size</h3>
      	<div class="input-group-text filter" data-filter="size-low"><input type="text" id="min-size" readonly></div>
      	<div class="input-group-text filter" data-filter="size-high"><input type="text" id="max-size" readonly></div>
        <div id="size-range"></div>
    	</div>
    	
    	<div class="filter filter_width" data-filter="tank_width">
      	<h3>Tank width</h3>
      	<ul>
          <li>
            <input type="radio" id="slimline" name="tank_width" value="slimline">
            <label for="slimline">Slimline</label>
            <div class="check"></div>
          </li>
          <li>
            <input type="radio" id="horizontal" name="tank_width" value="horizontal">
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
	$('#archive-filters').on('click', '.filter_submit' , function(){
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
			$(this).find('#min').each(function(){
				vals.push( $(this).val() );
			});
			
			// find checked inputs
			$(this).find('#max').each(function(){
				vals.push( $(this).val() );
			});
			
			// find checked inputs
			$(this).find('#min-size').each(function(){
				vals.push( $(this).val() );
			});
			
			// find checked inputs
			$(this).find('#max-size').each(function(){
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