<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\PagesController;
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
})->name('home');

Route::get('/testroute', [PagesController::class, 'testroute'])->name('testroute');
Route::get('/testroute2', [PagesController::class, 'testroute2'])->name('testroute2');
Route::get('/events',  [PagesController::class, 'events'])->name('events');

Route::get('events/{id}/order', [\App\Http\Controllers\TicketsController::class, 'order'])
    ->middleware(['auth'])
    ->name('events.orderticket');

Route::post('events/{id}/order', [\App\Http\Controllers\TicketsController::class, 'store'])
    ->middleware(['auth'])
    ->name('events.storeOrderTicket');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::resource('events', EventsController::class);
    // bovenstaande regel maakt voor ons gelijk al deze onderstaande routes aan, handig he:
    //Route::get('events', [EventsController::class, 'index'])->name('events.index');
    //Route::post('events', [EventsController::class, 'store'])->name('events.store');
    //Route::get('events/{id}', [EventsController::class, 'edit'])->name('events.edit');
    //Route::put('events/{id}', [EventsController::class, 'update'])->name('events.update');
    //Route::get('events/create', [EventsController::class, 'create'])->name('events.create');
    //Route::get('events/{id}/edit', [EventsController::class, 'update'])->name('events.update');
    //Route::delete('events/{id}', [EventsController::class, 'delete'])->name('events.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
