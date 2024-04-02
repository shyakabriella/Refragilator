<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureMonitoring extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'start_temperature', 'current_temperature'];
}
