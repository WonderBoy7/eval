<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CSVControlleur;
use App\Http\Controllers\DevisAdminController;
use App\Http\Controllers\DevisClientController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TravauxController;
// use App\Http\Controllers\CinemaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.client');
});


Route::middleware('auth')->group(function (){
    // Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');

    Route::get('/tables',[AdminController::class, 'showTable'])->name('table');
    Route::get('/importCSV',[AdminController::class, 'show_importCsv'])->name('importcsv');
    Route::get('/listeDevis',[DevisAdminController::class, 'listeDevis'])->name('devis.liste');
    Route::get('/dashboard',[AdminController::class, 'board'])->name('admin.dashboard');
    Route::get('/detailsDevis/{devis}',[DevisAdminController::class, 'detailsDevis'])->name('devis.details');
    Route::get('/listeTravail',[AdminController::class, 'listeTravaux'])->name('liste.travail');
    Route::put('/travail',[AdminController::class, 'modifTravaux'])->name('modif.travail');
    Route::get('/listeFinition',[AdminController::class, 'listeFinition'])->name('liste.finition');
    Route::put('/finition',[AdminController::class, 'modifFinition'])->name('modif.finition');
    Route::get('/reset',[AdminController::class, 'resetData'])->name('reset');
    Route::prefix('/import')->group(function () {
        Route::get('/form/btp', [CSVControlleur::class, 'maisonDevisImport'])->name('import.form.maison.devis');
        Route::post('/form/btp', [CSVControlleur::class, 'importTypeMaisonDevis'])->name('import.maison.devis');
        Route::get('/form/paiement', [CSVControlleur::class, 'paiementImport'])->name('import.form.paiement');
        Route::post('/form/paiement', [CSVControlleur::class, 'importPaiement'])->name('import.paiement');
    });



});

Route::get('/login', [UserController::class, 'loginPage'])->name('auth.login');
Route::post('/login', [UserController::class, 'doLogin'])->name('auth.login');
Route::get('/logout', [UserController::class, 'logoutPage'])->name('logout');
Route::get('/register', [UserController::class, 'registerPage'])->name('auth.register');
Route::post('/register', [UserController::class, 'doRegister'])->name('auth.register');

Route::get('/client/login', [ClientController::class, 'loginPage'])->name('client.login');
Route::post('/client/login', [ClientController::class, 'doLogin'])->name('client.login');
Route::get('/client/logout', [ClientController::class, 'logoutPage'])->name('client.logout');

Route::middleware('client.auth')->prefix('client')->group(function(){
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/devisCreate',[DevisClientController::class, 'addDevis'])->name('devis.create');
    Route::post('/devisCreate',[DevisClientController::class, 'storeDevis'])->name('devis.create');
    Route::prefix('pdf')->group(function(){
        Route::get('/devis/{devis}', [PDFController::class, 'generatePDF'])->name('pdf.devis');

    });
    Route::get('/paiement/{devis}',[ClientController::class, 'paiement'])->name('client.paiement');
    Route::post('/payer',[ClientController::class, 'ws_pay'])->name('client.payer');

    // Route::get('/devisListes',[DevisClientController::class, 'showListesDevis'])->name('devis.listes');


});
