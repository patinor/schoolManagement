<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|unique:etudiants,email',
            'tel'=>'required|unique:etudiants,tel',
            'password'=>'required',
            'password_confirm'=>'required',
            'adresse'=>'nullable'




        ];
    }


    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'nom.required'=>'Le nom est requis dans le formulaire',
            'prenom.required'=>'Le prenom est requis dans le formulaire',
            'email.unique'=>'L email existe déjà dans la base de données',
            'tel.unique'=>'Le numéro existe déjà dans la base de données',
            'password.required'=>'Le mot de passe ne peut etre vide ❌',
            'password_confirm'=>'Le mot de passe de confirmation ne peut etre vide ❌',
            'tel.unique'=>'Le numéro est requis dans le formulaire',
            'email.required'=>'L email est requis dans le formulaire',



        ];
    }
}
