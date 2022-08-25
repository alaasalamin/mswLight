<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TechnikerController;
use App\Http\Controllers\MoonRepairController;
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

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/home');
    }else{
        return view('index');
    }
});
Auth::routes();


Route::get('/home', [HomeController::class, 'index']);


Route::get('/newDevice', [DeviceController::class, 'newDevice']);
Route::get('/RMA', [DeviceController::class, 'RMA']);
Route::get('/returnDevice/{id}', [DeviceController::class, 'returnDevice']);
Route::post('/storeDevice', [DeviceController::class, 'store']);

Route::get('/device/{id}', [DeviceController::class, 'show']);
Route::get('/device/pdf/{id}', [DeviceController::class, 'pdfShow']);
Route::post('/updateDevice/{id}', [DeviceController::class, 'update']);
Route::post('/storeComment', [CommentController::class, 'store']);
Route::get('/devices/search/{keyword}', [DeviceController::class, 'search']);
Route::get('/devices/delete/{id}', [DeviceController::class, 'destroy']);


Route::get('tech/device/{id}', [TechnikerController::class, 'showDevice']);
Route::get('tech/device/take/{id}', [TechnikerController::class, 'takeDevice']);
Route::get('/tech/devices/search/{keyword}', [DeviceController::class, 'search']);

Route::get('admin/device/{id}', [AdminController::class, 'showDevice']);
Route::get('admin/devices/give/{techWithDevice}', [AdminController::class, 'give']);
Route::post('admin/updateDevice/{id}', [AdminController::class, 'updateDevice']);
Route::get('admin/deleteComment/{id}', [AdminController::class, 'destroyComment']);
Route::get('admin/closeDevice/{id}', [AdminController::class, 'closeDevice']);
Route::get('admin/openDevice/{id}', [AdminController::class, 'openDevice']);
Route::get('adminPanel', [AdminController::class, 'controlPanel']);
Route::post('/storeBrand', [BrandController::class, 'store']);
Route::get('/admin/deleteBrand/{id}', [BrandController::class, 'destroy']);
Route::get('/admin/Partners', [PartnerController::class, 'show']);
Route::get('/admin/techs', [AdminController::class, 'techsShow']);
Route::get('/admin/partner/{id}', [PartnerController::class, 'partner']);
Route::get('/admin/techs/{id}', [AdminController::class, 'techDevices']);


Route::get('moonRepair/devices/search/{keyword}', [MoonRepairController::class, 'search']);
Route::get('moonRepair/device/pdf/{id}', [MoonRepairController::class, 'pdfShow']);
Route::get('moonRepair/device/{id}', [MoonRepairController::class, 'show']);
Route::get('moonRepair/newDevice', [MoonRepairController::class, 'newDevice']);
Route::post('moonRepair/storeDevice', [MoonRepairController::class, 'store']);
Route::get('moonRepair/closeDevice/{id}', [MoonRepairController::class, 'closeDevice']);
Route::get('moonRepair/openDevice/{id}', [MoonRepairController::class, 'openDevice']);
Route::post('moonRepair/updateDevice/{id}', [MoonRepairController::class, 'updateDevice']);
Route::post('moonRepair/storeComment', [CommentController::class, 'commentStore']);


Route::post('/parts', [DeviceController::class, 'neededPart']);



// AdminPanel Routes
Route::post('adminSearchRequest', [AdminController::class, 'adminSearchRequest']);
Route::post('adminPanel/newTask', [AdminController::class, 'newTask']);
Route::post('adminPanel/editTask', [AdminController::class, 'editTask']);
Route::post('adminB2bDevice/adminPanel/Comment', [AdminController::class, 'b2bComment']);
Route::get('adminPanel/TaskDelete/{id}', [AdminController::class, 'taskDelete']);
Route::get('adminAllB2bDevices', [AdminController::class, 'allB2b']);
Route::get('adminAllB2cDevices', [AdminController::class, 'allB2c']);
Route::get('adminB2bDevice/{id}', [AdminController::class, 'b2bDevice']);
Route::get('adminPanel/Device/{id}', [AdminController::class, 'b2cDevice']);


