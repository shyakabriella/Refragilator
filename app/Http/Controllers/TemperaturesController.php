<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;

use App\Models\Temperature;


use Illuminate\Http\Request;
use App\Models\TemperatureMonitoring; // Make sure to use your actual model

class TemperaturesController extends Controller
{

    /**
     * Display the temperature data within the specified date range.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        if ($startDate && $endDate) {
            // Fetch temperatures with pagination
            $temperatures = TemperatureMonitoring::where('date', '>=', $startDate)
                                ->where('date', '<=', $endDate)
                                ->paginate(4); // Paginate to 4 items per page
        } else {
            // Simply don't fetch anything if we don't have both dates, and handle this scenario in the view
            $temperatures = null;
        }
    
        // Return a view, passing the temperature data to it
        return view('managerHome', compact('temperatures'));
    }

    public function WeeklyTemperature(Request $request){
        return "ooo";
    }

    public function lastTemperatures()
    {
        $temperatures = Temperature::orderBy('time_int', 'ASC')->limit(7)->get();
        return response()->json($temperatures);
    }

    public function lastSevenDaysHighestTemperatures()
    {
        // Retrieve the highest temperature for each of the last 7 days
        $highestTemperatures = DB::table('temperatures')
            ->select(DB::raw('DATE(time_int) AS date'), DB::raw('MAX(celsius) AS max_temperature'))
            ->where('time_int', '>=', now()->subDays(7)->startOfDay()) // Filter records for the last 7 days
            ->groupBy('date')
            ->orderBy('date', 'DESC') // Order by date in descending order (most recent first)
            ->get();

        return response()->json($highestTemperatures);
    }
}
