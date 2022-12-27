// send action
<button type="button" onClick="this.disabled=true; this.innerText='Sending…'; ">Send</button>

// send action
function submitAction() {
    $button = document.getElementById('foy_btn');
    $button.disabled = true;
    $button.innerText = 'Sending...';
};

// group by
$MaintenanceStats = Maintenance::whereYear('from', date('Y'))
    ->oldest()
    ->get()
    ->groupBy(function($val) {
        return Carbon::parse($val->from)->format('F');
     })
     ->take(7);

$trips = Trip::selectRaw("DATE_FORMAT(`start`, '%M-%y') as monthYear, year(`start`) AS year, month(`start`) AS month, monthname(`start`) AS monthName, count(id) AS totalTrips")
        ->where('status', 1)
        ->groupByRaw("monthName")
        ->groupByRaw("monthYear")
        ->groupByRaw("year")
        ->groupByRaw("month")
        ->orderBy('year', "DESC")
        ->orderBy('month', "DESC")
        ->get()->take(12);


<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script>
   var map;
    var markers = [];
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.8949, lng: 91.8687},
            zoom: 8
        });
        function addMarker(lat, lng) {
            var marker = new google.maps.Marker({
                position: {lat: lat, lng: lng},
                map: map
            });
            markers.push(marker);
        }
        function getLocations() {
            $.ajax({
                url: '/route/hello',
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        addMarker(data[i].latitude, data[i].longitude);
                    }
                }
            });
        }
        setInterval(function() {
        getLocations();
        }, 5000);

    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
