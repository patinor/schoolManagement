<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use App\Models\CorrectionEtudiant;
use App\Models\Cours;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Exercies_cours;
use App\Models\Lecon;
use App\Models\specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    //


    public function etudiant(){

        return view('student.register');
    }

    public function store_etudiant()


    {
        return view('student.login');
    }




    public function update_account(){

        $user=session()->get('etudiant');
         if(!$user){
            toastr()->error('');
            return redirect()->route('login.student');
         }


         return view('student.update',compact('user'));

    }


    public function listeLeconCours($id){

        $cours=Cours::find($id);
        if(!$cours){
            toastr()->error('Veuillez actualiser la page');
            return back();
        }

        $leconAll=Lecon::where('cours_id',$cours->id)->paginate(5);

        return view('student.details_lecon_etudiant',[
            'leconAll'=>$leconAll,
            'cours'=>$cours
        ]);
    }


    public function playVideoLecon($id){
        $lecon=Lecon::find($id);
        if(!$lecon){
            toastr()->error('Veuillez rafraichir la page !');
            return back();
        }

        $user=session()->get('etudiant');

        return view("student.play",[
            'lecon'=>$lecon,
            'user'=>$user
        ]);
    }


    public function update_etudiant(Request $etudiantRequest){


        $etudiant = Etudiant::find($etudiantRequest->id);
        $etudiant->nom=$etudiantRequest->nom;
        $etudiant->prenom=$etudiantRequest->prenom;

        $etudiant->email=$etudiantRequest->email;
        $etudiant->tel=$etudiantRequest->tel;

        if($etudiantRequest->hasFile('profile')){
            $etudiant->profile=$imagePath=$etudiantRequest->file('profile')->store('etudiant','public');
        }

        $etudiant->adresse=$etudiantRequest->adresse ? :'';
        $etudiant->save();

        session()->forget('etudiant');
        session()->put('etudiant',[$etudiant]);

        toastr()->success('Modification reussi avec succès !');

        return back();


    }

    public function create_etudiant(EtudiantRequest $etudiantRequest){

        if($etudiantRequest->password != $etudiantRequest->password_confirm){

            toastr()->error('Les mots de passes sont diffents');
            return back();
        }
        $etudiant = new Etudiant();
        $etudiant->nom=$etudiantRequest->nom;
        $etudiant->prenom=$etudiantRequest->prenom;

        $etudiant->email=$etudiantRequest->email;
        $etudiant->tel=$etudiantRequest->tel;
        $etudiant->password= Hash::make($etudiantRequest->password) ;

        $imagePath='';
        if($etudiantRequest->hasFile('profile')){
            $imagePath=$etudiantRequest->file('profile')->store('etudiant','public');
        }

        $etudiant->adresse=$etudiantRequest->adresse ? :'';
        $etudiant->profile=$imagePath;
        $etudiant->save();

        toastr()->success('Compte crée avec succèss !');

        return redirect()->route('login.student');


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

        $etudiant =Etudiant::where('email',$request->emailOrTel)->orWhere('tel',$request->emailOrTel)->first();

        if(!$etudiant){
            toastr()->warning('Vos informations sont incorrect');
            return back();
        }

        if(!Hash::check($request->password,$etudiant->password)){
            toastr()->warning('Vos informations sont incorrectes');
            return back();
        }

        toastr()->info('Connection reussie');
        session()->put('etudiant',[$etudiant]);
        session()->put('auth',true);

        return redirect()->route('home.etudiant.form');
    }

    public function home(){

        $user=session()->get('etudiant');
        $coursAll=Cours::paginate(5);

        $exercices=specialite::paginate(6);

        return view('student.cours',compact('user','exercices','coursAll'));
    }


    public function cours_etudiant($id){

        $specialite=specialite::find($id);
        if(!$specialite){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }
        $coursAll = Cours::paginate(5);

        $exoAll = Exercies_cours::paginate(5);
        $user=session()->get('etudiant');



        return view('Etudiant.cours',compact('coursAll','exoAll','user'));
    }


    public function logout(){

        session()->forget('etudiant');
        session()->forget('auth');

        return redirect()->route('store_etudiant.etudiant.form');


    }

    public function listesSoumission(){


        $user=session()->get('etudiant');
        $cours= CorrectionEtudiant::where('etudiant_id',$user[0]->id)->paginate(5);

        if(!$cours){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }

        if(!$cours){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }

        return view('Etudiant.soumis',compact('cours','user'));

    }


    public function cours_etudiant_vue($id){


        $specialite=specialite::find($id);
        if(!$specialite){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }
        $cours= Cours::find($id);

        if(!$cours){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }

        $user=session()->get('etudiant');



        return view('Etudiant.vue_cours',compact('cours','user'));
    }


    public function listesExercices($id){

        $specialite=specialite::find($id);
        if(!$specialite){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }
        $coursAll = DB::table('exercies_cours')
        ->join('enseignants','enseignants.id','=','exercies_cours.enseignant_id')
        ->join('specialites','specialites.id','=','enseignants.specialite_id')
        ->where('enseignants.specialite_id','=', $id)
        ->select('exercies_cours.*')
        ->paginate(2)
        ;

        $specialite=specialite::find($id);
        $user=session()->get('etudiant');

        return view('Etudiant.exercice',compact('coursAll','user','specialite'));
    }


    public function soumettreExerices(Request $request){

        $request->validate([
            'etudiant_id'=>'required',
            'specialite_id'=>'required',
            "document"=>'required|mimes:pdf'
        ],[
            'document.mimes'=>'Le document doit etre de type PDF 📄'
        ]);

        $correctionSend= new CorrectionEtudiant();
        $correctionSend->specialite_id	=$request->specialite_id;
        $correctionSend->etudiant_id	=$request->etudiant_id;
        if($request->hasFile('doc_soumis')){
            $correctionSend->doc_soumis	=$request->file('doc_soumis')->store("correction",'public');
        }

        $correctionSend->save();
        toastr()->info('Votre document à été soumis pour une correction veuillez ');

        return back();
    }




    public function listesVideo($id){

        $specialite=specialite::find($id);
        if(!$specialite){
            toastr()->warning('Veuillez vous connecter');

            return back();
        }
        $coursAll = DB::table('cours')
        ->join('enseignants','enseignants.id','=','cours.enseignant_id')
        ->join('specialites','specialites.id','=','enseignants.specialite_id')
        ->where('enseignants.specialite_id','=', $id)
        ->select('cours.*')
        ->paginate(2)
        ;

        $specialite=specialite::find($id);
        $user=session()->get('etudiant');

        return view('Etudiant.cours',compact('coursAll','user','specialite'));
    }



    public function searchCours(Request $request){

        $user=session()->get('etudiant');

        $coursAll=Cours::where('titre','LIKE','%'.$request->search.'%')
        ->orWhere('created_at','LIKE','%'.$request->search.'%')
        ->orWhere('id','LIKE','%'.$request->search.'%')

        ->
        paginate(6);
        return view('student.cours',compact('user','coursAll'));
    }

    public function searchLecon(Request $request){

        $user=session()->get('etudiant');

        $leconAll=Lecon::where('titre','LIKE','%'.$request->search.'%')
        ->orWhere('id','LIKE','%'.$request->search.'%')
        ->
        paginate(6);
        return view('student.cours',compact('user','coursAll'));
    }
}
