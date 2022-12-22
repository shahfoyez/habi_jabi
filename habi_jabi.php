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
