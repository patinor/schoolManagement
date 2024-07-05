<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\specialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function login(){

        /* $user=new User();
        $user->name='danielLevy';
        $user->email= 'exemple@gmail.com';
        $user->password= Hash::make('daniel');
        $user->save(); */

        return view('admin.login');
    }


    public function doLogin(Request $request){


        $credentials=$request->validate([
              'email'=>'required',
              'password'=>'nullable'
        ],[
            'email'=>'L email est requis dans la base de données',
        ]);

        if(!Auth::attempt($credentials)){
            toastr()->warning('Informations invalide, veuillez ressayer ');
            return back();
        }

        toastr()->success('Bienvenue  👋 ! connection reussi');

        return redirect()->route('dashboard.admin');
    }

    public function dashboard(){

        $profAll=Enseignant::paginate(5);
        $etudiantAll=Etudiant::paginate(5);
        return view('admin.home',[
            'profAll'=>$profAll,
            'etudiantAll'=>$etudiantAll
        ]);
    }


    public function specialite(){
        $specialiteAll = specialite::paginate(4);
        return view('admin.specialite',[
            'specialiteAll'=>$specialiteAll
        ]);
    }

    public function searchSpecialite(Request $request){
        $request->validate([
            'search'=>'required'
        ]);

        $specialiteAll = specialite::where('id','LIKE','%'.$request->search.'%')
        ->orWhere('specialite','LIKE','%'.$request->search.'%')
        ->orWhere('created_at','LIKE','%'.$request->search.'%')
        ->
        paginate(4);
        return view('admin.specialite',[
            'specialiteAll'=>$specialiteAll
        ]);
    }

    public function addSpecialite(Request $request){

        $request->validate([
            'specialite'=>'required|unique:specialites,specialite'
        ],[
            'specialite.required'=>'La spécialité est requise',
            'specialite.unique'=>'La spécialité existe déjà'
        ]);
        $specialite= new specialite();
        $specialite->specialite=$request->specialite;
        $specialite->save();
        toastr()->info('Informations  ajouté avec succèss');

        return back();
    }
    public function deconnection(){

        Auth::logout();

        return redirect()->route('admin.auth');
    }


    public function update(){
        return view('admin.update');
    }


    public function update_account(Request $request){

        $request->validate([

            'name'=>'required',
            'email'=>'required',
            'password'=>'nullable',
            'password_confirm'=>'nullable',
            'id'=>'required'
        ]);


        $user =User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;

        if($request->password){
            if($request->password != $request->password_confirm){

                toastr()->warning('Les mots de passes sont différents attentions');
                return back();
        }
        $user->password = bcrypt($request->password);
    }

    $user->save();

    toastr()->success('Compte mise à jour avec succès');
    return back();
}

public function updateSpecialite($id){


    $special=specialite::find($id);

    if(!$special){
        toastr()->error('Une erreur c est produite ');
        return back();
    }

    return view('admin.update_specialite',[
'special'=>$special
    ]);
}

public function updateSpecialites(Request $request){

    $request->validate([
        'specialite'=>'required|unique:specialites,specialite',
        'id'=>'required'
    ],[
        'specialite.required'=>'La spécialité est requise',
        'specialite.unique'=>'La spécialité existe déjà'
    ]);
    $specialite=specialite::find($request->id);

    if(!$specialite){
        toastr()->error('Une erreur c est produite ');
        return back();
    }
    $specialite->specialite=$request->specialite;
    $specialite->save();
    toastr()->info('Informations  ajouté avec succèss');

    return back();
}



public function etudiant(){


    $etudiantAll=Etudiant::paginate(5);

    return view('admin.etudiant',[
        'etudiantAll'=>$etudiantAll
    ]);
}

public function searEtudiant(Request $request){
    $request->validate([
         'search'=>'required'
    ]);

    $etudiantAll=Etudiant::where('nom','LIKE','%'.$request->search.'%')->
    orWhere('email','LIKE','%'.$request->search.'%')->
    orWhere('prenom','LIKE','%'.$request->search.'%')->
    orWhere('adresse','LIKE','%'.$request->search.'%')->
    orWhere('id','LIKE','%'.$request->search.'%')->
    paginate(5);
    return view('admin.etudiant',[
        'etudiantAll'=>$etudiantAll
    ]);
}

public function enseignant(){


    $professeurAll=Enseignant::paginate(5);

    return view('admin.professeur',[
        'professeurAll'=>$professeurAll
    ]);
}

public function searEnseignant(Request $request){

    $request->validate([
        'search'=>'required'
   ]);
    $professeurAll=Enseignant::where('nom','LIKE','%'.$request->search.'%')->
    orWhere('email','LIKE','%'.$request->search.'%')->
    orWhere('prenom','LIKE','%'.$request->search.'%')->
    orWhere('adresse','LIKE','%'.$request->search.'%')->
    orWhere('tel','LIKE','%'.$request->search.'%')->
    orWhere('id','LIKE','%'.$request->search.'%')->
    paginate(5);

    return view('admin.professeur',[
        'professeurAll'=>$professeurAll
    ]);
}

public function logoutAdmin(){

    Auth::logout();
    toastr()->success('Deconnection reussi à bientot 🖐');

    return redirect()->route('admin.auth');
}
public function enseignantEdit(){


    return view('admin.update');
}
}
