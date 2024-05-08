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
        // Return a response indicating success
        return response()->json([['message' => 'Device created successfully']], 201);
    }
    public function DelDevice(Request $request){
        $device = Device::find($request->id);
        if (!$device) {
            return response()->json([['message' => 'Device not found']], 404);
        }
        $device->delete();
        return response()->json([['message' => 'Device deleted successfully']], 200);
    }
    public function getAllDevices()
    {
        // Retrieve all devices from the database
        $devices = Device::all();
        // Return a JSON response with the devices array
        return response()->json($devices, 200);
    }
}
