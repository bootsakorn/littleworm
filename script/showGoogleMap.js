
      function initMap() {
      var bounds  = new google.maps.LatLngBounds();
			var mapOptions = {
			  center: {lat: 13.8470283, lng: 100.57180010000002},
			  zoom: 17,
			}
				;
			var maps = new google.maps.Map(document.getElementById("map"),mapOptions);

			var marker, info;

			$.getJSON( "../php/s.php", function( jsonObj ) {
					//*** loop
					$.each(jsonObj, function(i, item){
						marker = new google.maps.Marker({
						   position: new google.maps.LatLng(item.place_Lat, item.place_Lng),
						   map: maps,
						   title: item.LOC_NAME
						});

            var  loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
              bounds.extend(loc);
              maps.fitBounds(bounds);   // autozoom  
              maps.panToBounds(bounds); // autocenter
              maps.setZoom(16);

					  
            info = new google.maps.InfoWindow();

					  google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
						  info.setContent(item.place_Name + " " + item.place_Location);
						  info.open(maps, marker);
						}
					  })(marker, i));

					}); // loop

			 });
      

		}