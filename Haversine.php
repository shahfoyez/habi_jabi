public function calculateDistanceAndTime($lat1, $lon1, $lat2, $lon2, $mode)
    {
        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Calculate the distance using the Haversine formula
        $earth_radius = 6371; // Earth's radius in kilometers
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat/2) * sin($dlat/2) + cos($lat1) * cos($lat2) * sin($dlon/2) * sin($dlon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $distance = $earth_radius * $c; // Distance in kilometers

        // Calculate the average speed for the mode of transportation
        $speeds = [
            'walking' => 5, // Average walking speed in kilometers per hour
            'biking' => 20, // Average biking speed in kilometers per hour
            'driving' => 80, // Average driving speed in kilometers per hour
        ];
        $speed = $speeds[$mode]; // Average speed in kilometers per hour

        // Calculate the time it would take to travel the distance at the average speed
        $time = $distance / $speed; // Time in hours

        return [
            'distance' => $distance,
            'time' => $time,
        ];
    }
