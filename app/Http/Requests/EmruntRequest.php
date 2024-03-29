<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmruntRequest extends FormRequest
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
            'livre_id'=>'required',
            'date_emprunt'=>'required|date',
            'date_retour'=>'required|date|after_or_equal:date_emprunt',
        ];
    }
}
