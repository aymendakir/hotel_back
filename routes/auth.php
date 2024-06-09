<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;


use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\stripPaimnt;
use App\Models\chambre;
use App\Models\client;
use App\Models\paiement;

use Illuminate\Http\Request;
use App\Models\reservation;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest:adminate')
    ->name('login');
Route::post('/login/admin', [AuthenticatedSessionController::class, 'store_admin'])
    ->middleware('guest:adminate')
    ->name('login_admin');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
Route::middleware(['auth:sanctum,adminate,web'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});

/*Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
*/
Route::get('/chambers', [\App\Http\Controllers\ChambreController::class, 'index']);
Route::get('/chambers/dispo', [\App\Http\Controllers\ChambreController::class, 'index1']);
Route::put('/chamber', [\App\Http\Controllers\ChambreController::class, 'store']);

Route::get('/chamber/{chambre}', [\App\Http\Controllers\ChambreController::class, 'show']);
Route::get('/dispo/{chambre}', [\App\Http\Controllers\ChambreController::class, 'show1']);
Route::delete('/chamber/{chambre}', [\App\Http\Controllers\ChambreController::class, 'destroy']);
Route::put('/chambers/{chambre}', [\App\Http\Controllers\ChambreController::class, 'update']);

Route::get('/Typechamber', [\App\Http\Controllers\TypechambreController::class, 'index']);
Route::get('/Typechamber/lits/{Typechamber}', [\App\Http\Controllers\TypechambreController::class, 'index1']);



Route::post('stripe', [stripPaimnt::class, 'stripPost']);
Route::post('reservation', [ReservationController::class, 'store']);
Route::post('/reservation/{reservation}', [ReservationController::class, 'update']);
Route::post('/reservation/annulation/{reservation}', [ReservationController::class, 'annulation']);
Route::post('payment', [PaiementController::class, 'store']);
Route::get('payment', [PaiementController::class, 'index']);
Route::get('facture', [FactureController::class, 'index']);
Route::post('facture', [FactureController::class, 'store']);
Route::post('/upload/{facture}', [FactureController::class, 'update']);
Route::get('/factures/{facture}', [FactureController::class, 'show']);

Route::post('/reservations/all', function (Request $request) {
    $id = $request->id;
    $client = Client::find($id);

    if (!$client) {
        return response()->json(['error' => $id], 404);
    }

    return $client->reservation;
});


Route::put('updateclient/{client}', [ClientController::class, 'update']);





