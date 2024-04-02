<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureMonitorContact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'jobTitle', 'phoneNumber', 'email'];

}
