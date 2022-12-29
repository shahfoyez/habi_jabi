<script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script>
        var map;
        var markers = [];
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.8949, lng: 91.8687},
                zoom: 14
            });
            function getLocations() {
                $.ajax({
                    url: '/api/vehicles/location',
                    success: function(data) {
                        // Remove the existing markers from the map
                        for (var i = 0; i < markers.length; i++) {
                            markers[i].setMap(null);
                        }
                        markers = [];
                        // Add new markers to the map
                        for (var i = 0; i < data.length; i++) {
                            if(data[i].location){
                                var newlat = parseFloat(data[i].location['lat']);
                                var newlong = parseFloat(data[i].location['long']);
                                var marker = new google.maps.Marker({
                                    position: {lat: newlat, lng: newlong},
                                    icon: {
                                        url: "{{ asset('/assets/uploads/default/mapVehicle.png') }}",
                                        scaledSize: new google.maps.Size(30, 30),
                                        // origin: new google.maps.Point(0, 0),
                                        // anchor: new google.maps.Point(0, 0)
                                    },
                                    map: map
                                });

                                // Add a custom infowindow for the marker
                                var infowindow = new google.maps.InfoWindow({
                                    content: '<div>'+ data[i].codeName +'</div>'
                                });
                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            }
                            markers.push(marker);
                            console.log(marker);
                        }
                    }
                });
            }
            setInterval(function() {
                // deleteMarkers();
                getLocations();
            }, 5000);
        }
    </script>
<script>
        var map;
        var markers = [];
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.8949, lng: 91.8687},
                zoom: 14
            });
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
            }
        });
        }, 30000);

        // Add new markers to the map and add a static custom infowindow for each marker
        $.ajax({
        url: '/api/vehicles/location',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                if(data[i].location){
                    var newlat = parseFloat(data[i].location['lat']);
                    var newlong = parseFloat(data[i].location['long']);
                    var marker = new google.maps.Marker({
                        position: {lat: newlat, lng: newlong},
                        icon: {
                            url: "{{ asset('/assets/uploads/default/mapVehicle.png') }}",
                            scaledSize: new google.maps.Size(30, 30),
                        },
                        map: map
                    });

                    var infowindow = new google.maps.InfoWindow({
                        content: '<div>' + newlong + '</div><div>' + newlong + '</div>'
                    });
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                }
                markers.push(marker);
            }
        }
        });


    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
