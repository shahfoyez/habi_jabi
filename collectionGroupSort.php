<?php
$trips = OnTripVehicle::with([
            'vehicle' => function ($query) {
                $query->select('id', 'codeName');
            },
            'vehicle.location'
        ])
        ->with([
            'trip' => function($query){
                $query->selectRaw("*, DATE_FORMAT(`start`, '%d %b, %h:%i %p') as tripStart");
            },
            'trip.rout' => function ($query) {
                $query->select('id', 'route');
            },
            'trip.driver' => function ($query) {
                $query->select('id', 'name');
            },
        ])
        ->get();
        // dd($trips);

        // return $trips;
        $withLocationShow = $trips->filter(function ($item) {
            // return $item['vehicle']->location !== null && $item['show_map'] === 1;
            return $item['vehicle']->location !== null && $item['show_map'] === 1;
        });
        $withoutLocationHide = $trips->filter(function ($item) {
            return $item['vehicle']->location == null || $item['show_map'] === 0;
        });
        // $grouped = $withoutLocationHide->sortBy(function($item){
        //     return $item->trip->start;
        // });
        $grouped = $withoutLocationHide->groupBy(function ($onTripVehicle) {
            return $onTripVehicle->trip->rout->route;
        })->map(function($routeGroup){
            return $routeGroup->sortByDesc(function($onTripVehicle){
                return $onTripVehicle->trip->start;
            });
        });
?>
