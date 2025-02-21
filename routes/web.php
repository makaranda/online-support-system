<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Guests\HomeController;
use App\Http\Controllers\Admin\Email\EmailController;
use App\Http\Controllers\Admin\SMS\SMSController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Home\HomeController as AdminHomeController;

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
Route::get('/',[HomeController::class, 'home_page'])->name('home');
Route::get('/login',[HomeController::class, 'login_page'])->name('login');
Route::post('/login/submit',[LoginController::class, 'loginSubmit'])->name('login.submit');

Route::prefix('guests')->group(function () {
    Route::get('open-ticket', [HomeController::class, 'open_ticket_page'])->name('guests.open_ticket');
    Route::post('open-ticket', [HomeController::class, 'open_ticket_save'])->name('guests.open_ticket_save');
    Route::get('check-ticket-status', [HomeController::class, 'check_ticket_status'])->name('guests.check_ticket_status');
    Route::post('reply-ticket-form-data', [HomeController::class, 'save_reply_ticket_data'])->name('guests.save_reply_ticket_data');

//  Survey Form
    Route::get('survey-form', [HomeController::class, 'survey_form'])->name('guests.survey_form');
    Route::post('survey-form-save', [HomeController::class, 'survey_form_save'])->name('guests.survey_form_save');
});

// Route::get('opened_tickets','Admin\Tickets\OpenedTicketController')->name('tickets.opened_tickets');
// Route::get('assigned_tickets','Admin\Tickets\AssignedTicketController')->name('tickets.assigned_tickets');
// Route::get('closed_tickets','Admin\Tickets\ClosedTicketController')->name('tickets.closed_tickets');
// Route::get('recent_tickets','Admin\Tickets\RecentTicketController')->name('tickets.recent_tickets');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Auth::routes();

