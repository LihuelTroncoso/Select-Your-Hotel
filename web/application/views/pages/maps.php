<div class="container mt-5">
	<div id="gmapBlock"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(function() {
			var script = document.createElement('script');
			script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
			document.body.appendChild(script);
		});

		function initialize() {
			var map;
			var bounds = new google.maps.LatLngBounds();
			var mapOptions = {
				mapTypeId: 'roadmap'
			};

			map = new google.maps.Map(document.getElementById("gmapBlock"), mapOptions);
			map.setTilt(45);

			var locationMarkers = JSON.parse(`<?php echo ($locationMarkers); ?>`);

			var locInfo = JSON.parse(`<?php echo ($locInfo); ?>`);

			var infoWindow = new google.maps.InfoWindow(),
				marker, i;

			for (i = 0; i < locationMarkers.length; i++) {
				var position = new google.maps.LatLng(locationMarkers[i][1], locationMarkers[i][2]);
				bounds.extend(position);
				marker = new google.maps.Marker({
					position: position,
					map: map,
					title: locationMarkers[i][0]
				});

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infoWindow.setContent(locInfo[i][0]);
						infoWindow.open(map, marker);
					}
				})(marker, i));

				map.fitBounds(bounds);
			}

			var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
				this.setZoom(5);
				google.maps.event.removeListener(boundsListener);
			});
		}
	</script>
</div>