<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TemperatureMonitorContactController;
use App\Http\Controllers\TemperatureMonitoringController;
use App\Http\Controllers\TemperaturesController;
use App\Http\Controllers\DeviceControllerX;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

  

Route::get('/', [PageController::class, 'index'])->name('/');
Route::resource('temperature-monitor-contacts', TemperatureMonitorContactController::class);
Route::resource('temperature-monitorings', TemperatureMonitoringController::class);
// Remove or rename this route
// Route::get('temperature-monitorings/show', [TemperatureMonitoringController::class, 'show'])->name('temperature-monitorings.show');
Route::get('/temperature-monitorings', [TemperatureMonitoringController::class, 'index'])->name('temperature-monitorings.index');
Route::get('/manager-home', [HomeController::class, 'managerHome'])->name('manager-home');
Route::get('/temperatures', [TemperaturesController::class, 'show'])->name('temperatures.show');

Route::get("/mobile_connect",[TemperaturesController::class, 'WeeklyTemperature'])->name("temperatures.weekly");

Route::post("/mobile_app/new_device",[DeviceControllerX::class, 'NewDevice'])->name("device.new");
Route::get("/mobile_app/delete_device",[DeviceControllerX::class, 'DelDevice'])->name("device.remove");

Route::post('/mobile_app/all_device_list', [DeviceControllerX::class, 'getAllDevices'])->name("device.view");





Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');

});