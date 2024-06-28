<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Models\Enseignant;
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
    return view('welcome');
});

Route::get('/etudiant',[EtudiantController::class,'etudiant'])->name('etudiant.form');
Route::get('/etudiant-login',[EtudiantController::class,'store_etudiant'])->name('store_etudiant.etudiant.form');

Route::get('/etudiant-home_page',[EtudiantController::class,'home'])->name('home.etudiant.form');
Route::get('/enseigant-register',[EnseignantController::class,'register'])->name('register.prof');
Route::post('/enseignant-authentification_login',[EnseignantController::class,'doLogin'])->name('authentification.prof');
Route::get('/login-prof-dashboard',[EnseignantController::class,'store_etudiant'])->name('store_enseignant');
Route::post('/enseignant-register_enseignant',[EnseignantController::class,'create_enseignant'])->name('create.enseignant');
Route::get('/enseignant-home',[EnseignantController::class,'home'])->name('Prof.home');
Route::get('/enseignant-deconnection',[EnseignantController::class,'deconnection'])->name('Prof.home.deconnection');
Route::get('/enseignant-update_account',[EnseignantController::class,'update_account'])->name('update_account.account');
Route::post('/enseignant-register_enseignant_update',[EnseignantController::class,'enseignant_update'])->name('update.account.enseignant');
Route::get('/enseignant-ajouter_cours',[EnseignantController::class,'cours_enseignant'])->name('ajouter.cours');

Route::post('/enseignement-ajouter-cours',[EnseignantController::class,'addCoursProf'])->name('addCours.Prof');

Route::get('/enseignement-details-cours/{id}',[EnseignantController::class,'detailsCours'])->name('details.cours.prof');
Route::post('/enseignement-update-cours',[EnseignantController::class,'updateCours'])->name('updateCours.professeur');
Route::get('/enseignement-delete-cours/{id}',[EnseignantController::class,'deleteCours'])->name('delete.cours.prof');

Route::post('/etudiant-authentification',[EtudiantController::class,'doLogin'])->name('create.doLogin');
Route::post('/etudiant-creation-compte',[EtudiantController::class,'create_etudiant'])->name('create.account.etudiant');



// Partie de l administrateur
Route::get('/authentification_admin',[AdminController::class,'login'])->name('admin.auth');

Route::post('/authentification_admin_account',[AdminController::class,'doLogin'])->name('admin.auth.account');


Route::get('/dashboard-admin',[AdminController::class,'dashboard'])->name('dashboard.admin');

Route::get('/dashboard-admin-update',[AdminController::class,'update'])->name('update.admin.informations');
Route::get('/dashboard-deconnection',[AdminController::class,'deconnection'])->name('deconnection.admin.account');
Route::get('/dashboard-specialite',[AdminController::class,'specialite'])->name('specialite.listes.admin');

Route::post('/dashboard-add-specialite',[AdminController::class,'addSpecialite'])->name('specialite.listes');
Route::post('/dashboard-ajouter_specialite_prof',[AdminController::class,'addSpecialite'])->name('addSpecialite.prof');

