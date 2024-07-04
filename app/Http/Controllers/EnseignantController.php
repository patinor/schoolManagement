<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantRequest;
use App\Models\CorrectionEtudiant;
use App\Models\Cours;
use App\Models\Enseignant;
use App\Models\Exercies_cours;
use App\Models\specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnseignantController extends Controller
{
    //



    public function register(){

        $specialite=specialite::all();
        return view('Prof.prof',compact('specialite'));
    }


    public function deconnection(){
        session()->forget('authProf');
        session()->forget('prof');
        toastr()->info('A bientot 🖐');
        return redirect()->route('login.prof_app');
    }


    public function create_enseignant(EnseignantRequest $etudiantRequest){

        if($etudiantRequest->password != $etudiantRequest->password_confirm){

            toastr()->error('Les mots de passes sont diffents');
            return back();
        }
        $etudiant = new Enseignant();
        $etudiant->nom=$etudiantRequest->nom;
        $etudiant->prenom=$etudiantRequest->prenom;

        $etudiant->email=$etudiantRequest->email;
        $etudiant->tel=$etudiantRequest->tel;
        $etudiant->password= Hash::make($etudiantRequest->password) ;

        $imagePath='';
        if($etudiantRequest->hasFile('profile')){
            $imagePath=$etudiantRequest->file('profile')->store('prof','public');
        }

        $etudiant->adresse=$etudiantRequest->adresse ? :'';
        $etudiant->specialite_id=$etudiantRequest->specialite_id;

        $etudiant->profile=$imagePath;
        $etudiant->save();

        toastr()->success('Compte crée avec succèss !');

        return redirect()->route('login.prof_app');


    }


    public function cours_enseignant(){

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_etudiant.etudiant.form');
        }
        $user=session()->get('prof');
        return view('Prof.cours',compact('user'));
    }
    public function enseignant_update(Request $etudiantRequest){


        $etudiant = Enseignant::find($etudiantRequest->id);
        if(!$etudiant){
            toastr()->error('Une erreur c est produite !');
            return back();
        }
        $etudiant->nom=$etudiantRequest->nom;
        $etudiant->prenom=$etudiantRequest->prenom;

        $etudiant->email=$etudiantRequest->email;
        $etudiant->tel=$etudiantRequest->tel;

        $imagePath='';
        if($etudiantRequest->hasFile('profile')){
            $imagePath=$etudiantRequest->file('profile')->store('prof','public');
        }

        $etudiant->adresse=$etudiantRequest->adresse ? :'';
        $etudiant->specialite_id=$etudiantRequest->specialite_id ;

        $etudiant->profile=$imagePath;
        $etudiant->save();

        session()->forget('prof');
        session()->put('prof',[$etudiant]);
        toastr()->success('Mise à jour reussi !');

        return back();


    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'emailOrTel'=>'required',
            'password'=>'required'
        ],[
            'emailOrTel.required'=>'L identifiant est requis',
            'password.required'=>'Le mot de passe ne peut etre vide'
        ]);

        $etudiant =Enseignant::where('email',$request->emailOrTel)->orWhere('tel',$request->emailOrTel)->first();

        if(!$etudiant){
            toastr()->warning('Vos informations sont incorrect 1');
            return back();
        }

        if(!Hash::check($request->password,$etudiant->password)){
            toastr()->warning('Vos informations sont incorrect 2');
            return back();
        }

        toastr()->info('Connection reussie');
        session()->put('prof',[$etudiant]);
        session()->put('authProf',true);

        return redirect()->route('Prof.home');
    }




    public function addCoursProf(Request $request){

        $request->validate([
              'cours'=>'required',
              'titre'=>'required',
              'id'=>'required'
        ]);

        $cours=new Cours();
        $cours->enseignant_id=$request->id;
        $cours->titre=$request->titre;
        $imagePath='';
        if($request->hasFile('cours')){
            $imagePath=$request->file('cours')->store('cours','public');
        }
        $cours->cours=$imagePath;

        $cours->save();
        toastr()->info('Informations validé');
        return back();


    }
    public function home(){
        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        $user=session()->get('prof');
        $coursAll=Cours::where('enseignant_id',$user[0]->id)->paginate(5);
        $exerciesAll=Exercies_cours::where('enseignant_id',$user[0]->id)->paginate(5);
        return view('Prof.home',compact('user','coursAll','exerciesAll'));
    }

    public function login_prof()


    {
        return view('Prof.login');
    }

    public function detailsCours($id){
        $cours=Cours::find($id);
        if(!$cours){
            toastr()->error('Cours inexistant dans la base');
            return back();
        }

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        $user=session()->get('prof');

        return view('Prof.details_cours',compact('user','cours'));
    }


    public function detailsCoursAppercu($id){
        $cours=Cours::find($id);
        if(!$cours){
            toastr()->error('Cours inexistant dans la base');
            return back();
        }

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        $user=session()->get('prof');

        return view('Prof.apper_cours',compact('user','cours'));
    }


    public function update_account(){

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_etudiant.etudiant.form');
        }
        $user=session()->get('prof');
        $specialite=specialite::all();
        return view("Prof.update",compact('user','specialite'));
    }


    public function updateCours(Request $request ){
        $cours=Cours::find($request->id);
        if(!$cours){
            toastr()->error('Cours inexistant dans la base');
            return back();
        }

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        if($request->hasFile('cours')){
            $cours->cours=$request->file('cours')->store('cours','public');
        }
        $cours->titre=$request->titre;
        $cours->touch();
        $cours->save();
        toastr()->info('Cours mise à jour avec succèss !');
        return back();
    }



    public function deleteCours($id){
        $cours=Cours::find($id);
        if(!$cours){
            toastr()->warning('Le cours est inexistant');
        }
        $cours->delete();
        toastr()->success('Cours supprimé avec succèss !');
        return redirect()->route('Prof.home');
    }


    public function addExercice(Request $request){
        $request->validate([
             'cours_pdf'=>'required|mimes:pdf',
             'titre'=>'required',
             'id'=>'required'
        ],[
            'cours_pdf.mimes'=>'Le fichier doit etre de format PDF',
            'id.required'=>'L opération ne peut etre effectué',
            'cours_pdf.required'=>'Le fichier est requis dans la base de données',
        ]);

        $exercice= new Exercies_cours();


        $exercice->titre=$request->titre;
            $exercice->cours_pdf=$request->file('cours_pdf')->store('exo','public');
            $exercice->enseignant_id=$request->id;
            $exercice->save();
            toastr()->info('Exercice ajouté avec succèss!');
            return back();

    }


    public function editeCoursExo($id){
        $cours=Exercies_cours::find($id);
        if(!$cours){
            toastr()->error('Cours inexistant dans la base');
            return back();
        }

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        $user=session()->get('prof');

        return view('Prof.details_exo',compact('user','cours'));
    }


    public function updateCoursExercices(Request $request ){
        $cours=Exercies_cours::find($request->id);
        if(!$cours){
            toastr()->error('Cours inexistant dans la base');
            return back();
        }

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        if($request->hasFile('cours')){
            $cours->cours=$request->file('cours_pdf')->store('cours_pdf','public');
        }
        $cours->touch();
        $cours->titre =$request->titre;
        $cours->save();
        toastr()->info('Cours mise à jour avec succèss !');
        return back();
    }



    public function coursListes(){

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        $user=session()->get('prof');
        $coursAll=Cours::where('enseignant_id',$user[0]->id)->paginate(5);

        return view('Prof.cours',compact('coursAll','user'));
    }


    public function listesSoumission(){

        if(!session()->get('prof') && !session()->get('auth')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        $user=session()->get('prof');
        $cours= CorrectionEtudiant::paginate(5);

        if(!$cours){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }

        if(!$cours){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }

        return view('Prof.soumission',compact('cours','user'));

    }




    public function editeSoumission($id){
        if(!session()->get('prof') && !session()->get('auth')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        $user=session()->get('prof');
        $cours= CorrectionEtudiant::find($id);

        if(!$cours){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }

        if(!$cours){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }

        return view('Prof.details_soumission',compact('user','cours'));
    }


   public function updateCourSoumission(Request $request ){
        $cours=CorrectionEtudiant::find($request->id);
        if(!$cours){
            toastr()->error('Cours inexistant dans la base');
            return back();
        }

        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_enseignant');
        }
        if($request->hasFile('correction')){
            $cours->correction=$request->file('correction')->store('correction','public');
        }
        $cours->touch();
        $cours->save();
        toastr()->info('Cours mise à jour avec succèss !');
        return back();
    }
}
