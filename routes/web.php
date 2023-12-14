<?php
use App\Http\Controllers\Admin\EventController  as AdminEventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

// Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events/show/{event}', [EventController::class, 'show'])->name('show.event');
Route::get('/events/dashboard', [EventController::class, 'showDashboard']);

Route::middleware(['auth' => 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admin.dashboard');
    Route::get('/admin/events/viewEvents', [AdminEventController    ::class, 'upComing'])->name('admin.viewEvents');
    Route::get('/admin/events/create', [AdminEventController::class, 'create'])->name('create.event');
    Route::post('/admin/events/create', [AdminEventController::class, 'store'])->name('save.event');
    Route::get('/admin/events/{event}/edit', [AdminEventController::class, 'edit'])->name('edit.event');
    Route::PUT  ('/admin/events/{event}', [AdminEventController::class, 'update'])->name('update.event');
    Route::delete('/admin/viewEvents/{event}', [AdminEventController::class, 'destroy'])->name('delete.event');
});

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/tickets/index/{event}', [ReservationController::class, 'index'])->name('new.reservation');
    Route::post('/tickets/create/{event}', [ReservationController::class, 'store'])->name('ticket.store');
    Route::get('/tickets/confirm', [TicketController::class, 'index'])->name('ticket.confirm');

});

// Route::middleware(['guest'])->get('/', function () {
//     return view('home');
// })->name('home');



