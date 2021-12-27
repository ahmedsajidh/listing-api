<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

/*

|--------------------------------------------------------------------------

| API Routes

|--------------------------------------------------------------------------

|

| Here is where you can register API routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| is assigned the "api" middleware group. Enjoy building your API!

|

*/


Route::post('admin/login',[\App\Http\Controllers\AdminloginController::class, 'adminLogin'])->name('adminLogin');
Route::post('admin/register',[\App\Http\Controllers\RegisterController::class, 'AdminCreate'])->name('adminRegister');

Route::group( ['prefix' => 'admin','middleware' => ['auth:admin-api','scopes:admin'] ],function(){

    // authenticated staff routes here

    Route::get('dashboard',[\App\Http\Controllers\DashboardController::class, 'adminDashboard']);

});
