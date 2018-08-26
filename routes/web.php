<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Home
Route::get("/", "HomeController@Index");

Route::get("Home/Contact", "HomeController@Contact");
Route::post("Home/Contact", "HomeController@ContactPOST");

Route::get("Home/About", "HomeController@About");


//Team
Route::get("Team/LosAngelesLakers", "TeamController@LosAngelesLakers");
Route::get("Team/MiamiHeat", "TeamController@MiamiHeat");
Route::get("Team/GoldenStateWarriors", "TeamController@GoldenStateWarriors");
Route::get("Team/SanAntonioSpurs", "TeamController@SanAntonioSpurs");


//Account
Route::get("Account/Register", "AccountController@Register");
Route::get("Account/Register.blade.php", "AccountController@Register");
Route::post("Account/Register.blade.php", "AccountController@RegisterPOST");

Route::get("Account/Login", "AccountController@Login");
Route::get("Account/Login.blade.php", "AccountController@Login");
Route::post("Account/Login.blade.php", "AccountController@LoginPOST");

Route::get("Account/Profile", "AccountController@Profile");
Route::post("Account/Profile", "AccountController@ProfilePOST");

Route::get("Account/Logout", "AccountController@Logout");


/**
 * This route is defined to access files that are stored in 'storage' folder
 * You can see the examples of accessing files from 'storage' folder in 'Profile' view
 */
Route::get('/avatars/{filename}', function ($filename){
  $path = storage_path('app/public/avatars/' . $filename);

  if(!File::exists($path)) abort(404);

  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);
  return $response;
})->name('avatar');
