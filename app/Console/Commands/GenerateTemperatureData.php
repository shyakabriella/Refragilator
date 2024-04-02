<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TemperatureMonitoring;

class GenerateTemperatureData extends Command
{
    protected $signature = 'temperature:generate';

    protected $description = 'Generate and store temperature data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $date = now()->toDateString();
        $startTemperature = mt_rand(0, 50); // Generate random temperature
        $currentTemperature = mt_rand(0, 50); // Generate random temperature

        TemperatureMonitoring::create([
            'date' => $date,
            'start_temperature' => $startTemperature,
            'current_temperature' => $currentTemperature,
        ]);

        $this->info('Temperature data generated and saved successfully.');
    }
}
