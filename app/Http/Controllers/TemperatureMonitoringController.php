<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\TemperatureMonitoring;
use Illuminate\Support\Facades\Http;

class TemperatureTaskScheduler extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

     
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $apiKey = config('services.weather_api.key');
            $location = config('services.weather_api.location');
            
            $response = Http::get('https://api.weatherapi.com/v1/current.json', [
                'key' => $apiKey,
                'q' => $location,
            ]);

            if ($response->failed()) {
                \Log::error('Failed to fetch temperature data from the API.');
                return;
            }

            $temperature = $response->json()['current']['temp_c'];
            $date = now()->toDateString();

            // Store the generated temperature data in the database
            TemperatureMonitoring::create([
                'date' => $date,
                'start_temperature' => $temperature,
                'current_temperature' => $temperature,
                'location' => $location,
            ]);

            \Log::info('Temperature data generated and saved successfully.', [
                'location' => $location,
                'temperature' => $temperature,
            ]);

            $this->triggerAlarm();
        })->everyMinute();
    }

    public function show(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $temperatures = TemperatureMonitoring::whereDate('date', '>=', $startDate)
                            ->whereDate('date', '<=', $endDate)
                            ->get();

        return view('temperatures.show', compact('temperatures'));
    }

    /**
     * Trigger the alarm.
     */
    protected function triggerAlarm()
    {
        // Use the exec function to trigger a system beep
        exec('echo -en "\007"');

        \Log::info('Alarm triggered: Temperature data generated.');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
