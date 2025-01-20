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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test', function () {
    return response()->json([
        'SERVER_NAME_env' => env('SERVER_NAME', 'Variable non définie'),
        'SERVER_NAME_getenv' => getenv('SERVER_NAME') ?: 'Variable non définie',
        'SERVER_NAME_config' => config('app.server_name', 'Variable non définie'),
    ]);
});

Route::get('/diagnostic', function () {
    return response()->json([
        'SERVER_NAME_env' => env('SERVER_NAME', 'Non défini'),
        'SERVER_NAME_getenv' => getenv('SERVER_NAME') ?: 'Non défini',
        'SERVER_NAME_config' => config('app.server_name', 'Non défini'),
        '_SERVER' => $_SERVER['SERVER_NAME'] ?? 'Non défini',
        '_ENV' => $_ENV['SERVER_NAME'] ?? 'Non défini',
    ]);
});




Route::get('/env-test', function () {
    dd(env('APP_ENV'));
    return response()->json([
        'file_exists' => file_exists(base_path('.env')) ? 'Yes' : 'No',
        'contents' => file_get_contents(base_path('.env')),
    ]);
});

require __DIR__.'/auth.php';
