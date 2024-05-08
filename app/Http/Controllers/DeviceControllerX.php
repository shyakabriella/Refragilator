<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\device;

class DeviceControllerX extends Controller
{
    //
    public function NewDevice(Request $request){
        $device = new device();

        $device->serial = $request->serial_number;
        $device->save();
    }
}
