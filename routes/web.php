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
    return redirect()->route('rooms.index');
});


Route::group(['as' => 'rooms.', 'prefix' => 'rooms','middleware'=>'auth'],function () {
    Route::get('/',\App\Http\Livewire\Room\Index::class)->name('index');
    Route::get('{room:slug}',\App\Http\Livewire\Room\ShowRoom::class)->name('show');
});

Route::get('/dashboard', function () {
    return redirect()->route('rooms.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
