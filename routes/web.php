<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('welcome'); })->name('welcome');

Route::post('/registrar-viaje', 'ViajeController@registrar');

// Login Dashboard
Route::get('/dashboard/login', function () {
    if (!Auth::check()) {
        return view('dashboard.login');
    }
    return back();
});

Route::group(['middleware' => ['auth.admin']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Grupo de Rutas para el listado de programacion de viaje
    Route::group(['middleware' => ['permission:programacion-viaje|universal']], function () {
        Route::get('/dashboard/programacion-viaje', 'DashboardController@programacionViaje')->name('programacion-viaje');
        Route::get('/dashboard/{id}/programacion-viaje', 'DashboardController@verSolicitud');
        Route::post('/dashboard/programacion-viaje/get-ciudades', 'DashboardController@getCiudades');

        Route::get('/get-origen', 'DashboardController@getOrigen');
        Route::get('/get-destino', 'DashboardController@getDestino');
    });

});


Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');