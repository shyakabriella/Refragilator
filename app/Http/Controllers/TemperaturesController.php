<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;


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
    
    
}
