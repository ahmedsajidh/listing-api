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




Route::post('user/login',[LoginController::class, 'userLogin'])->name('userLogin');
Route::post('user/register',[\App\Http\Controllers\RegisterController::class, 'UserCreate'])->name('userRegister');

Route::group( ['prefix' => 'user','middleware' => ['auth:user-api','scopes:user'] ],function(){

    // authenticated staff routes here

    Route::get('dashboard',[\App\Http\Controllers\DashboardController::class, 'userDashboard']);

});