<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantRequest;
use App\Models\CorrectionEtudiant;
use App\Models\Cours;
use App\Models\Enseignant;
use App\Models\Exercies_cours;
use App\Models\ExoStudent;
use App\Models\Lecon;
use App\Models\specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnseignantController extends Controller
{
    //



    public function listesLecon(){
        $user=session()->get('prof');
        $coursAll=Lecon::paginate(5);
        $coursLecon=Cours::all();
        return view('Prof.Lecons',compact('coursAll','coursLecon','user'));
    }


    public function listesExercices(){
        $user=session()->get('prof');
        $coursAll=ExoStudent::paginate(5);
        $coursLecon=Cours::all();
        return view('Prof.exercices',compact('coursAll','coursLecon','user'));
    }


    public function detailsExercices($id){
        $cours=ExoStudent::find($id);
        if(!$cours){
            toastr()->error('Veuillez rafraichir la page !');
            return back();
        }
        
        $user=session()->get('prof');
        $coursLecon=Cours::all();
        return view('Prof.details_exo',compact('cours','coursLecon','user'));
    }




    


    public function createLecon(Request $request){

        $request->validate([
            'titre'=>'required',
            'video'=>'required',
            'cours_id'=>'required'
        ],[
            'titre.required'=>'Le titre est requis',
            'cours_id.required'=>'Veuillez choisir un cours !',
            'video.required'=>'La vidéo n est pas correct'
        ]);

        $lecon = new Lecon();
        $lecon->titre=$request->titre;
        $lecon->cours_id=$request->cours_id;        

        $lecon->video=$request->video;
        $lecon->save();
        toastr()->success('Leçon ajouté avec succès !');
        return back();


    }


    public function detailsLecon($id){

        $cours=Lecon::find($id);
        if(!$cours){
            toastr()->warning('Veuillez renitialiser la page');
            return back();
        }

        $user=session()->get('prof');
        $coursLecon=Cours::all();
        return view('Prof.details_lecon',compact('user','cours','coursLecon'));
    }

    public function updateLecon(Request $request){

        $request->validate([
            'titre'=>'required',
            'video'=>'required',
            'cours_id'=>'required',
            'id'=>'required'
        ],[
            'titre.required'=>'Le titre est requis',
            'cours_id.required'=>'Veuillez choisir un cours !',
            'video.required'=>'La vidéo n est pas correct'
        ]);

        $lecon = Lecon::find($request->id);
        if(!$lecon){
            toastr()->warning('Veuillez renitialiser la page');
            return back();
        }
        $lecon->titre=$request->titre;
        $lecon->cours_id=$request->cours_id;        

        $lecon->video=$request->video;
        $lecon->save();
        toastr()->success('Leçon modifé avec succès !');
        return back();


    }

    public function register(){

        $specialite=specialite::all();
        return view('teacher.register',compact('specialite'));
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
        $enseignant= new Enseignant();
        $enseignant->nom=$etudiantRequest->nom;
        $enseignant->prenom=$etudiantRequest->prenom;

        $enseignant->email=$etudiantRequest->email;
        $enseignant->tel=$etudiantRequest->tel;
        $enseignant->password= Hash::make($etudiantRequest->password) ;

        $imagePath='';
        if($etudiantRequest->hasFile('profile')){
            $imagePath=$etudiantRequest->file('profile')->store('prof','public');
        }

        $enseignant->adresse=$etudiantRequest->adresse ? :'';
        $enseignant->specialite_id=$etudiantRequest->specialite_id;

        $enseignant->profile=$imagePath;
        $enseignant->save();

        toastr()->success('Compte crée avec succèss !');

        return redirect()->route('login.prof_app');


    }


    public function cours_enseignant(){


        $user=session()->get('prof');
        return view('Prof.cours',compact('user'));
    }
    public function enseignant_update(Request $etudiantRequest){


        $enseignant = Enseignant::find($etudiantRequest->id);
        if(!$enseignant){
            toastr()->error('Une erreur c est produite !');
            return back();
        }
        $enseignant->nom=$etudiantRequest->nom;
        $enseignant->prenom=$etudiantRequest->prenom;

        $enseignant->email=$etudiantRequest->email;
        $enseignant->tel=$etudiantRequest->tel;

        $imagePath='';
        if($etudiantRequest->hasFile('profile')){
            $imagePath=$etudiantRequest->file('profile')->store('prof','public');
        }


       
        $enseignant->adresse=$etudiantRequest->adresse ? :'';
        $enseignant->specialite_id=$etudiantRequest->specialite_id ;

        $enseignant->profile=$imagePath;
        $enseignant->save();

        session()->forget('prof');
        session()->put('prof',[$enseignant]);
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

        $enseignant =Enseignant::where('email',$request->emailOrTel)->orWhere('tel',$request->emailOrTel)->first();

        if(!$enseignant){
            toastr()->warning('Vos informations sont incorrect 1');
            return back();
        }

        if(!Hash::check($request->password,$enseignant->password)){
            toastr()->warning('Vos informations sont incorrect 2');
            return back();
        }

        toastr()->info('Connection reussie');
        session()->put('prof',[$enseignant]);
        session()->put('authProf',true);

        return redirect()->route('Prof.home');
    }




    public function addCoursProf(Request $request){

        $request->validate([
              'image'=>'required',
              'titre'=>'required',
              'id'=>'required'
        ]);

        $cours=new Cours();
        $cours->enseignant_id=$request->id;
        $cours->titre=$request->titre;
        $imagePath='';
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('cours','public');
        }
        $cours->image=$imagePath;

        $cours->save();
        toastr()->info('Informations validé');
        return back();


    }
    public function home(){
       
        $user=session()->get('prof');
        $exerciesAll=Exercies_cours::where('enseignant_id',$user[0]->id)->paginate(5);
        return view('Prof.home',compact('user','exerciesAll'));
    }

    public function login_prof()


    {
        return view('teacher.login');
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


        if($request->hasFile('image')){
            $cours->image=$request->file('image')->store('cours','public');
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
            return back();
        }
        $cours->delete();
        toastr()->success('Cours supprimé avec succèss !');
        return redirect()->route('Prof.home');
    }


    public function addExercice(Request $request){
        $request->validate([
             'fichier'=>'required|mimes:pdf',
             'titre'=>'required',
             'cours_id'=>'required'
        ],[
            'fichier.mimes'=>'Le fichier doit etre de format PDF',
            'cours_id.required'=>'L opération ne peut etre effectué',
            'fichier.required'=>'Le fichier est requis dans la base de données',
        ]);

        $exercice= new ExoStudent();


        $exercice->titre=$request->titre;
            $exercice->fichier=$request->file('fichier')->store('exo','public');
            $exercice->cours_id=$request->cours_id;
            $exercice->save();
            toastr()->info('Exercice ajouté avec succèss!');
            return back();

    }


    
    public function updateExercice(Request $request){

        //dd($request);
        $request->validate([
             'fichier'=>'nullable|mimes:pdf',
             'titre'=>'required',
             'cours_id'=>'required',
             'id'=>'required'

        ],[
            'fichier.mimes'=>'Le fichier doit etre de format PDF',
            'cours_id.required'=>'L opération ne peut etre effectué',
        ]);

        $exercice=ExoStudent::find($request->id);

        if(!$exercice){
            toastr()->error('Cours inexistant dans la base');
            return back();
        }

        
             $exercice->titre=$request->titre;
             if($request->hasFile('fichier')){

                 $exercice->fichier=$request->file('fichier')->store('exo','public');
             }
            $exercice->cours_id=$request->cours_id;
            $exercice->save();
            toastr()->info('Exercice modifié avec success !!');
            return back();

    }

    public function editeCoursExo($id){
        $cours=Exercies_cours::find($id);
        if(!$cours){
            toastr()->error('Cours inexistant dans la base');
            return back();
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
        $user=session()->get('prof');
        $coursAll=Cours::where('enseignant_id',$user[0]->id)->paginate(5);

        return view('Prof.cours',compact('coursAll','user'));
    }


    public function listesSoumission(){
        $user=session()->get('prof');
        $cours= CorrectionEtudiant::orderBy('id','DESC')->paginate(5);

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


        if($request->hasFile('correction')){
            $cours->correction=$request->file('correction')->store('correction','public');
        }
        $cours->touch();
        $cours->save();
        toastr()->info('Cours mise à jour avec succèss !');
        return back();
    }


    public function searchExercices(Request $request){
        $request->validate([
             'search'=>'required'
        ]);

        $user=session()->get('prof');
        $exerciesAll=Exercies_cours::where('enseignant_id',$user[0]->id)
        ->where('titre','LIKE','%'.$request->search.'%')
        ->OrWhere('created_at','LIKE','%'.$request->search.'%')
        ->
        paginate(5);
        return view('Prof.home',compact('user','exerciesAll'));

    }



    public function Searchcours(Request $request){
        $request->validate([
            'search'=>'required'
       ]);

        $user=session()->get('prof');
        $coursAll=Cours::where('enseignant_id',$user[0]->id)
        ->where('titre','LIKE','%'.$request->search.'%')
        ->orWhere('created_at','LIKE','%'.$request->search.'%')
        ->orWhere('updated_at','LIKE','%'.$request->search.'%')

        ->paginate(5);

        return view('Prof.cours',compact('coursAll','user'));
    }

}
