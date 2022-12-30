<style>
    .pac-card {
    background-color: #fff;
    border: 0;
    border-radius: 2px;
    box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
    margin: 10px;
    padding: 0 0.5em;
    font: 400 18px Roboto, Arial, sans-serif;
    overflow: hidden;
    font-family: Roboto;
    padding: 0;
    }

    #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
    }

    .pac-controls {
    display: inline-block;
    padding: 5px 11px;
    }

    .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
    }

    #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
    }

    #pac-input:focus {
    border-color: #4d90fe;
    }
</style>

<script>
    function initMap() {
        // Set the starting location and zoom level of the map
        var map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.8949, lng: 91.8687 },
            zoom: 15,
            scrollwheel: true,
        });
        const uluru = { lat: 24.8949, lng: 91.8687 };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker,'position_changed', function (){
            let lat = marker.position.lat()
            let lng = marker.position.lng()
            // console.log(marker.position())
            // let label = marker.position.label()
            $('#slat').val(lat)
            $('#slon').val(lng)
            // $('#slabel').val(label)

        })
        google.maps.event.addListener(map,'click', function (event){
            pos = event.latLng
            marker.setPosition(pos)
        })

        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();

            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                console.log("Returned place contains no geometry");
                return;
                }

                const icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25),
                };

                // Create a marker for each place.
                markers.push(
                new google.maps.Marker({
                    map,
                    icon,
                    title: place.name,
                    position: place.geometry.location,
                })
                );
                if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
                } else {
                bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
</script>
{{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=places"></script> --}}
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=places&v=weekly"></script>
{{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script> --}}
