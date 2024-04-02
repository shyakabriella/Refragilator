<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TemperatureMonitoring;
use Illuminate\Support\Facades\Http;

class MonitorTemperature extends Command
{
    protected $signature = 'temperature:monitor';

    protected $description = 'Monitor temperature and save to database';

    public function handle()
    {
        $apiKey = config('services.weather_api.key');
        $location = config('services.weather_api.location');
        
        $response = Http::get('https://api.weatherapi.com/v1/current.json', [
            'key' => $apiKey,
            'q' => $location,
        ]);

        if ($response->failed()) {
            $this->error('Failed to fetch temperature data from the API.');
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

        $this->info('Temperature data generated and saved successfully.');
    }
}
