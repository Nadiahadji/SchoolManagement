<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersementController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CondidatController;
use App\Http\Controllers\PaiementFormationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AchatController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration-success', function () {
    return view('auth.registration-success');
})->name('registration.success');


Route::get('/dashboard',[HomeController::class, 'index'])->middleware(['auth', 'check.status'])->name('dashboard');


    Route::middleware('auth', 'check.status')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('eleves', EleveController::class);
    Route::resource('users', UserController::class)->except(['show']); 
    Route::post('users/{user}/toggleActivation', [UserController::class, 'toggleActivation'])->name('users.toggleActivation');
    Route::post('eleves/{id}/versements', [VersementController::class, 'store'])->name('eleves.versements');
    Route::get('/eleves/{id}/payments', [EleveController::class, 'payments'])->name('eleves.payments');

    Route::get('eleves/{id}/payments', [EleveController::class, 'payments'])->name('eleves.payments');

    Route::get('versements/{id}/edit', [VersementController::class, 'edit'])->name('versements.edit');
    Route::put('versements/{id}', [VersementController::class, 'updateVer'])->name('versements.updateVer');
    Route::delete('versements/{id}', [VersementController::class, 'destroyVer'])->name('versements.destroy');
    // Route::get('/user/{search}', [UserController::class, 'search'])->name('user.search');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/eleve/search', [EleveController::class, 'search'])->name('eleve.search');
    Route::get('/formateur/search', [FormateurController::class, 'search'])->name('formateur.search');
    Route::get('/formation/search', [FormationController::class, 'search'])->name('formation.search');
    Route::get('condidat/search', [CondidatController::class, 'search'])->name('condidat.search');
    Route::get('paiement/search', [PaiementFormationController::class, 'search'])->name('paiement.search');

    Route::resource('formateurs', FormateurController::class);
    Route::resource('formations', FormationController::class);
    // Routes pour les candidats
Route::resource('condidats', CondidatController::class);

// Routes pour les paiements de formation
Route::resource('paiements', PaiementFormationController::class);

// Route de recherche pour les candidats

Route::get('condidats/{condidat}/inscrire', [CondidatController::class, 'inscrireFormationForm'])->name('condidats.inscrire');
Route::post('condidats/{condidat}/inscrire', [CondidatController::class, 'inscrireFormation'])->name('condidats.inscrireFormation');
Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
Route::get('eleves/{id}/imprimer-contrat', [EleveController::class, 'imprimerContrat'])->name('eleves.imprimerContrat');
Route::get('condidats/{id}/formations/{formation_id}/imprimer-contrat', [CondidatController::class, 'imprimerContrat'])->name('condidats.imprimerContrat');
Route::resource('achats', AchatController::class);


});

require __DIR__.'/auth.php';
