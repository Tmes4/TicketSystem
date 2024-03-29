<?php

use App\Http\Controllers\Admin\EventController  as AdminEventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Models\Event;
use App\Models\Reservation;
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
    Route::get('/admin/events/viewEvents', [AdminEventController::class, 'index'])->name('admin.viewEvents');
    Route::get('/get-all-events', [AdminEventController::class, 'getAllEvents'])->name('getAllEvents');
    Route::get('/get-upcoming-events', [AdminEventController::class, 'getUpcomingEvents'])->name('getUpcomingEvents');
    Route::get('/get-pass-events', [AdminEventController::class, 'getPassEvents'])->name('getPassEvents');
    Route::get('/admin/events/create', [AdminEventController::class, 'create'])->name('create.event');
    Route::post('/admin/events/create', [AdminEventController::class, 'store'])->name('save.event');
    Route::get('/admin/events/{event}/edit', [AdminEventController::class, 'edit'])->name('edit.event');
    Route::PUT('/admin/events/{event}', [AdminEventController::class, 'update'])->name('update.event');
    Route::delete('/admin/viewEvents/{event}', [AdminEventController::class, 'destroy'])->name('delete.event');
    Route::get('/admin/reservations/viewReservations', [ReservationController::class, 'view'])->name('view.reservations');
    Route::get('/get-all-reservations', [ReservationController::class, 'getAllReservations'])->name('getAllReservations');
    Route::get('/get-future-reservations', [ReservationController::class, 'getfutureReservations'])->name('getfutureReservations');
    Route::get('/get-pass-reservations', [ReservationController::class, 'getPassReservations'])->name('getpassReservations');
    Route::delete('/admin/viewReservations/{reservation}', [ReservationController::class, 'destroy'])->name('delete.reservation');
    Route::get('/admin/reservations/create', [ReservationController::class, 'create'])->name('create.reservation');
    Route::put('/admin/viewReservations/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
});

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/reservations/viewReservations/', [ReservationController::class, 'viewReservations'])->name('view.reservation');
    Route::get('/reservations/index', [ReservationController::class, 'show'])->name('show.reservations');
    Route::get('/tickets/index/{event}', [ReservationController::class, 'index'])->name('new.reservation');
    Route::post('/tickets/create/{event}', [ReservationController::class, 'store'])->name('ticket.store');
    Route::get('/tickets/confirm', [TicketController::class, 'index'])->name('ticket.confirm');
    Route::get('/tickets/{event}', [TicketController::class, 'show'])->name('ticket.show');
    Route::get('/reservation/{id}/pdf',[ReservationController::class, 'downloadPdf'])->name('reservation.pdf');
        // Route::get('/download-tickets', [TicketController::class, 'download'])->name('download.tickets');
});

// Route::get('/generate-pdf', 'PDFController@generate');

// Route::middleware(['guest'])->get('/', function () {
//     return view('home');
// })->name('home');
