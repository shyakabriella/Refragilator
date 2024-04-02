<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemperatureMonitoring;
use Carbon\Carbon;
use App\Models\User; // Ensure User model is used if it's needed elsewhere

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }

    public function managerHome(Request $request)
    {
        $itemsPerPage = 5;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $itemsPerPage;

        // Initialize temperatures variable
        $temperaturesQuery = TemperatureMonitoring::query(); // Adjusted to use TemperatureMonitoring

        // Check if start_date and end_date are provided in the request
        if ($request->filled(['start_date', 'end_date'])) {
            // Parse input dates into Carbon instances
            $start_date = Carbon::createFromFormat('d m Y', $request->input('start_date'))->startOfDay();
            $end_date = Carbon::createFromFormat('d m Y', $request->input('end_date'))->endOfDay();

            // Adjust query to filter by date range
            $temperaturesQuery = $temperaturesQuery->whereBetween('date', [$start_date, $end_date]);
        } elseif ($request->hasAny(['start_date', 'end_date'])) {
            // If only one of the dates is selected, display a message to pick a date range
            session()->flash('status', 'Please pick a complete date range.');
            // Return early to avoid executing an empty query
            return view('managerHome', ['temperatures' => []]);
        }

        // Calculate total items for pagination
        $totalItems = $temperaturesQuery->count();
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Fetch the data for the current page with limit and offset
        $temperatures = $temperaturesQuery->skip($offset)->take($itemsPerPage)->get();

        return view('managerHome', compact('temperatures', 'page', 'totalPages'));
    }
   
}
