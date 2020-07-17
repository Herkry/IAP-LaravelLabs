<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/car", "CarController@newCar");
Route::get("/car/{id}", "CarController@particularCar");
Route::get("/car", "CarController@allCars");
Route::get("/newcar", "CarController@newCarForm");

Route::get("/car/{id}/reviews", "CarController@carReviews");
