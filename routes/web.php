<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller\HomeController;

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
    return view('welcome');
});
Route::get('presentazione', function(){
    return view('welcome');
});
Route::get('home', function(){
    $errore = false;
    return view('home')
    ->with('csrf_token', csrf_token())
    ->with('errore', $errore);
});


Route::get('logout', "LoginController@logout");

Route::get('home/{errore}', "HomeController@check");
Route::post('home', "SignupController@create")->name('signup');
Route::get('home/email/{q}', "SignupController@checkEmail");
Route::get('home/username/{q}', "SignupController@checkUsername");


Route::post('home_utente', 'LoginController@checkLogin')->name('login');
Route::get('home_utente', "HomeController@index");

Route::get('event', "HomeController@feed");

Route::get('ticketmaster', "CreateController@random");
Route::get('ticketmaster/search/{q}', "CreateController@search");

//Route::get('carrello/{id}', "CreateController@insertCart");
Route::post('carrello/insert', "CreateController@insertCart");
Route::get('carrello', "HomeController@indexCart");
Route::get('show', "HomeController@showCart");


Route::post('checkout',"HomeController@checkOut");

Route::get('storico', "HomeController@showStorico");
Route::get('prenCorrente', "HomeController@prenCorrente");
Route::get('prenPassata', "HomeController@prenPassata");
Route::get('remove/{id}', "CreateController@removeFromCart");

Route::get('crea', "CreateController@create");
Route::post('crea', "CreateController@save")->name('crea');

Route::get('errore', function(){
    return view('errore')->with('csrf_token', csrf_token());
});