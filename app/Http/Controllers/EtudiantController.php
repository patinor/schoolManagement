<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use App\Models\Cours;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    //


    public function etudiant(){

        return view('Etudiant.etudiant');
    }

    public function store_etudiant()


    {
        return view('Etudiant.login');
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

        return redirect()->route('store_etudiant.etudiant.form');


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
            toastr()->warning('Vos informations sont incorrect');
            return back();
        }

        toastr()->info('Connection reussie');
        session()->put('etudiant',[$etudiant]);
        session()->put('auth',true);

        return redirect()->route('home.etudiant.form');
    }

    public function home(){
        if(!session()->get('etudiant') && !session()->get('auth')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('store_etudiant.etudiant.form');
        }
        $user=session()->get('etudiant');
        $coursAll=Cours::where('enseignant_id',$user[0]->id);

        return view('Etudiant.home',compact('user'));
    }
}
