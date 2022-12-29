<style>
  .foy_map_infoWindow p{
    color: #333;
    font-family: Roboto,Arial;
    font-size: 11px;
    user-select: text;
    font-weight: 400;
}
.foy_map_infoWindow .foy_infoWindow_heading{
    font-weight: 500;
    font-size: 12px;
}
</style>
<script>
        var map;
        var markers = [];
        function initMap() {
            map = new google.maps.Map(document.getElementById('locationMap'), {
                center: {lat: 24.8949, lng: 91.8687},
                zoom: 12
            });
        }
        // update marker position
        function addMarker(data) {
            var newlat = parseFloat(data.location['lat']);
            var newlong = parseFloat(data.location['long']);
            var driverName = data.active_trip['driver'].name ?? 'No Driver';
            var route = 'Route '+data.active_trip['route'] ?? 'No Route';
            var from =  data.active_trip['from'] ?? 'No Data';
            var dest =  data.active_trip['dest'] ?? 'No Data';

            var vehName = data.codeName ?? 'No Name';
            var marker = new google.maps.Marker({
                position: {lat: newlat, lng: newlong},
                map: map,
                icon: {
                    url: "{{ asset('/assets/uploads/default/mapVehicle.png') }}",
                    scaledSize: new google.maps.Size(30, 30),
                    // rotation: 180
                    // origin: new google.maps.Point(0, 0),
                    // anchor: new google.maps.Point(0, 0)
                },

            });

            // Marker circle
            var circle = new google.maps.Circle({
                map: map,
                radius: 200, // Circle radius in meters
                // center: {lat: location.lat, lng: location.lng},
                fillColor: '#FF0000',
                strokeColor: '#FF0000',
                strokeWeight: 1
            });
            // Add circle around map
            circle.bindTo('center', marker, 'position');
            // Animate the circle
            var count = 0;
            window.setInterval(function() {
            count = (count + 1) % 200;

            // Update the radius of the circle
            circle.setOptions({
                radius: (count + 50)
            });
            }, 10);
            // Info window content
            var infowindow = new google.maps.InfoWindow({
                content: `<div class="foy_map_infoWindow"><p class='m-0 foy_infoWindow_heading'>${vehName}</p><p class='m-0'>${route}</p><p class='m-0'>${driverName}</p><p class='m-0'> <i class="fas fa-solid fa-plane-arrival"></i> ${dest}</p></div>`,
            });
            // All marker window open
            infowindow.open(map, marker);
            // Click to open window
            // marker.addListener('click', function() {
            //     // map.setZoom(15);
            //     // map.setCenter(marker.getPosition());
            //     infowindow.open(map, marker);
            // });
            // hideMarkers();
            markers.push(marker);
        }
        // Fetch the location data and update the map every 10 seconds
        setInterval(function() {
        $.ajax({
            url: '/api/vehicles/location',
            success: function(data) {
                console.log(data);
                // Update the position of the existing markers
                for (var i = 0; i < data.length; i++) {
                    if(data[i].location){
                        var newlat = parseFloat(data[i].location['lat']);
                        var newlong = parseFloat(data[i].location['long']);
                    }
                    markers[i].setPosition({lat: newlat, lng: newlong});
                }
                // New map variable
                var bounds = new google.maps.LatLngBounds();
                // Add markers to the bounds object
                markers.forEach(function(marker) {
                    bounds.extend(marker.getPosition());
                });
                // Center the map and zoom to fit the markers
                map.fitBounds(bounds, {
                    zoom: 10 // Set the zoom level
                });
                map.setZoom(14);
            }
        });
        }, 5000);

        // Add new markers to the map and add a static custom infowindow for each marker
        $.ajax({
        url: '/api/vehicles/location',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                if(data[i].location){
                    addMarker(data[i]);
                }
            }
        }
        });
    </script>
