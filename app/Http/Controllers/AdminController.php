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


        return view('admin.login');
    }


    public function doLogin(Request $request){


        $credentials=$request->validate([
              'email'=>'required',
              'password'=>'required'
        ],[
            'email'=>'L email est requis dans la base de données',
            'password'=>'Le mot de passe est requis'
        ]);

        if(!Auth::attempt($credentials)){
            toastr()->warning('Informations invalide');
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
}
