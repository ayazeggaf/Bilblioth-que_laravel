<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuteurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom'=>'required|regex:/^[A-Z]/',
            'prenom'=>'required|min:3'

        ];
    }
    public function messages()
    {
        return[
            'nom.required'=>'le nom est darouri',
            'nom.regex'=>'le debut de nom doit estre en majuscule',
            'prenom.required'=>'le prenom est obligatoire!',
            'prenom.min'=>'le lenght de prenom doit etre plus de 3 caractere',
        ];
    }
}
