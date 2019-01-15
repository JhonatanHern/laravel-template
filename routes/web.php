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
use App\User;

//the next header is set in order to allow React apps in development
//to access the server's data. Remove it if unnecesary
header('Access-Control-Allow-Origin:  localhost:3000');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
 * Static routes you want to use in your react app. They'll return
 * your HTML on ./public/react_index.html
*/
$static_router_routes = array(
	"/dynamicUrl1",
	"/dynamicUrl2",
	"/dynamicUrl3",
);
foreach ($static_router_routes as $route) {
	Route::get($route,function(){
		return File::get('react_index.html');
	});
}