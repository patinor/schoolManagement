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
|lcome
*/

Route::get('/', function () {
    return view('student.home');
})->name('home.page');

Route::get('/etudiant',[EtudiantController::class,'etudiant'])->name('etudiant.form');
Route::get('/etudiant-login',[EtudiantController::class,'store_etudiant'])->name('login.student');

Route::get('/enseigant-register',[EnseignantController::class,'register'])->name('register.prof');
Route::post('/enseignant-authentification_login',[EnseignantController::class,'doLogin'])->name('authentification.prof');
Route::get('/login-prof-dashboard',[EnseignantController::class,'login_prof'])->name('login.prof_app');
Route::post('/enseignant-register_enseignant',[EnseignantController::class,'create_enseignant'])->name('create.enseignant');

Route::post('/etudiant-creation-compte',[EtudiantController::class,'create_etudiant'])->name('create.account.etudiant');

// Partie de l administrateur
Route::get('/authentification_admin',[AdminController::class,'login'])->name('admin.auth');

Route::post('/authentification_admin_account',[AdminController::class,'doLogin'])->name('admin.auth.account');

// Protection des routes de l administrateur
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard-admin-update',[AdminController::class,'enseignantEdit'])->name('update.admin.informations');
    Route::get('/dashboard-deconnection',[AdminController::class,'deconnection'])->name('deconnection.admin.account');
    Route::get('/dashboard-specialite',[AdminController::class,'specialite'])->name('specialite.listes.admin');
    Route::post('/dashboard-ajouter_specialite_prof',[AdminController::class,'addSpecialite'])->name('addSpecialite.prof');
    Route::get('/dashboard-admin',[AdminController::class,'dashboard'])->name('dashboard.admin');
    Route::post('/dashboard-update_account',[AdminController::class,'update_account'])->name('update_account.admin');
    Route::post('/dashboard-update_specialite',[AdminController::class,'updateSpecialites'])->name('updateS.pecialites');
    Route::post('/dashboard-rechercheSpecialite',[AdminController::class,'searchSpecialite'])->name('searchSpecialite.admin');
    Route::post('/dashboard-rechercheEtudiant',[AdminController::class,'searEtudiant'])->name('searEtudiant.admin');

    Route::get('/ddetailsSpecialite/{id}',[AdminController::class,'updateSpecialite'])->name('updateSpecialite.details');
    Route::get('/listesDesETudiants',[AdminController::class,'etudiant'])->name('listes.etudiants');
    Route::get('/listesDesProfesseur',[AdminController::class,'enseignant'])->name('listes.professeurs');

    Route::get('/logoutAdmin',[AdminController::class,'logoutAdmin'])->name('admin.logout');

});
Route::post('/etudiant-authentification',[EtudiantController::class,'doLogin'])->name('create.doLogin');


// Etudiant Routes protection
Route::middleware(['etudiant.auth'])->group(function () {

    Route::get('/etudiant-cours_exercices_vide/{id}',[EtudiantController::class,'cours_etudiant_vue'])->name('cours.etudiant.vue');
    Route::get('/etudiant-cours_video_etudiant/{id}',[EtudiantController::class,'listesVideo'])->name('listes.Video');
    Route::get('/etudiant-listesDocumentSoumis',[EtudiantController::class,'listesSoumission'])->name('listes.Soumission');


    Route::get('/etudiant-listesExercices',[EtudiantController::class,'exercicesCours'])->name('listes.exercices.etudiant');
    Route::get('/etudiant-details-exercices/{id}',[EtudiantController::class,'detailsExercices'])->name('listes.details.Exercices');

        Route::get('/etudiant-cours_exercices/{id}',[EtudiantController::class,'cours_etudiant'])->name('cours_etudiant.details');

    Route::get('/etudiant-cours_exercices/{id}',[EtudiantController::class,'cours_etudiant'])->name('cours_etudiant.details');
    Route::get('/etudiant-cours_listes_lecon/{id}',[EtudiantController::class,'listeLeconCours'])->name('liste.LeconCours.student');

    Route::get('/update_account_etudiant',[EtudiantController::class,'update_account'])->name('update.account.etudiant');

    Route::get('/etudiant-logout_etudiant',[EtudiantController::class,'logout'])->name('logout.etudiant');
    Route::get('/etudiant-cours_play_LeconVideo/{id}',[EtudiantController::class,'playVideoLecon'])->name('play.Video.Lecon');

    Route::post('/soumissionDevoir',[EtudiantController::class,'soumettreExerices'])->name('soumettre.Exerices');
    Route::post('/recherceheCoursEtudiant',[EtudiantController::class,'searchCours'])->name('searchCours.etudiant');
    Route::get('/etudiant-listesExercices/{id}',[EtudiantController::class,'listesExercices'])->name('listes.Exercices.cours');

    Route::get('/etudiant-home_page',[EtudiantController::class,'home'])->name('home.etudiant.form');

    Route::post('/update_validation_information',[EtudiantController::class,'update_etudiant'])->name('update_etudiant.account');

    Route::post('/update_rechercheLecon',[EtudiantController::class,'searchLecon'])->name('recherche.searchLecon');

});




// Etudiant Routes protection
Route::middleware(['prof.auth'])->group(function () {


Route::post('/enseignant-ajouter_exercices',[EnseignantController::class,'addExercice'])->name('ajouter.exo.cours');

Route::post('/enseignement-ajouter-cours',[EnseignantController::class,'addCoursProf'])->name('addCours.Prof');
Route::post('/enseignement-recherche-exercices',[EnseignantController::class,'searchExercices'])->name('search.Exercices.prof');
Route::post('/enseignement-recherche-cours',[EnseignantController::class,'Searchcours'])->name('Search.cours.details');

Route::get('/enseignement-details-coursAppercu-lecon',[EnseignantController::class,'listesLecon'])->name('listes.Lecon');
Route::get('/enseignement-details-exercices',[EnseignantController::class,'listesExercices'])->name('listes.Exercices');
Route::post('/enseignement-create-exercices',[EnseignantController::class,'addExercice'])->name('add.Exercice.prof');

Route::get('/enseignement-details-coursAppercu/{id}',[EnseignantController::class,'detailsCoursAppercu'])->name('details.Cours.Appercu');
Route::get('/listesSoumissionExoEtudiant',[EnseignantController::class,'listesSoumission'])->name('listes.Soumission.prof');
Route::get('/enseignement-details-soumissions/{id}',[EnseignantController::class,'editeSoumission'])->name('edite.Soumission.etudiant');
Route::post('/enseignement-ajouteLecon',[EnseignantController::class,'createLecon'])->name('create.Lecon.enseignant');


Route::get('/enseignement-details-lecon/{id}',[EnseignantController::class,'detailsLecon'])->name('detailsLecon.cours.prof');
Route::post('/enseignement-update-lecon',[EnseignantController::class,'updateLecon'])->name('updateLecon.enseignant');

Route::get('/enseignement-details-cours/{id}',[EnseignantController::class,'detailsCours'])->name('details.cours.prof');
Route::post('/enseignement-update-cours',[EnseignantController::class,'updateCours'])->name('updateCours.professeur');
Route::get('/enseignement-delete-cours/{id}',[EnseignantController::class,'deleteCours'])->name('delete.cours.prof');
Route::post('/enseignement-cours-exercices',[EnseignantController::class,'updateCoursExercices'])->name('exercices_pdf.update');
Route::get('/enseignant-home',[EnseignantController::class,'home'])->name('Prof.home');
Route::get('/enseignant-deconnection',[EnseignantController::class,'deconnection'])->name('Prof.home.deconnection');
Route::get('/enseignant-update_account',[EnseignantController::class,'update_account'])->name('update_account.account');
Route::post('/enseignant-register_enseignant_update',[EnseignantController::class,'enseignant_update'])->name('update.account.enseignant');
Route::get('/enseignant-listes_cours',[EnseignantController::class,'coursListes'])->name('cours.Listes');

Route::get('/enseignement-update-exercices/{id}',[EnseignantController::class,'detailsExercices'])->name('edite.CoursExo');

Route::post('/enseignement-ajouter-correction-soumis',[EnseignantController::class,'updateCourSoumission'])->name('update.Cour.Soumission');

Route::post('/enseignement-update-exercices',[EnseignantController::class,'updateExercice'])->name('update.Exercice.prof');

});
