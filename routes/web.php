<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users;

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
    return redirect('dashboard');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    // Route::get('/dashboard', function() {
    //     return view('dashboard');
    // })->name('dashboard');

     Route::get('dashboard', Users::class)->name('dashboard');
     Route::resource('users', Users::class);
     Route::post('users/store', [Users::class, 'store'])->name('createUser');     
});
