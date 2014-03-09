		<div class="container">

			<div class="row">

				<div class="col-md-3">
				
				</div>
				
				<div class="col-md-9">
					<div id="map-canvas"></div>
				</div>

			</div>

		</div> <!-- /container -->

		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6x__caSSACAJWV9uoEYA6mcP9J4xdo_c&sensor=false"></script>
		<script type="text/javascript">
			function initialize() {
				// Set map-canvas height
				var height = $(window).height() - 80;
				if(height < 200) {
					height = 200;
				}
				$('#map-canvas').height(height);


				var styles = [
								{
									stylers: [
										{ saturation: -80 },
									]
								},
								{
									featureType: "road.arterial",
									elementType: "geometry",
									stylers: [
										{ hue: "#4D4D4D" },
										{ saturation: 50 }
									]
								},
							];

				var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});

				var mapOptions = {
					center: new google.maps.LatLng(-34.397, 150.644),
					zoom: 8,
					mapTypeControlOptions: {
						mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
					},
				};
				var map = new google.maps.Map(document.getElementById("map-canvas"),
						mapOptions);

				map.mapTypes.set('map_style', styledMap);
				map.setMapTypeId('map_style');
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>