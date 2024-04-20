<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProdRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nom' => 'required|min:5',
            'prix' => 'required',
            'categorie' => 'required|min:5',
            'description' => 'required|min:10',
            'taillesdesponibles' => 'required|min:2',
            // validation d'email
            // 'email'=>'required|email'
        ];
    }
    public function messages()
    {
        return
            [
                'nom.required' => 'le nom doit etre required',
                'nom.min' => 'le nom doit etre superieur du 5 caracteres',
                'prix.required' => 'le prix doit etre required',
                'categorie.required' => 'la categorie doit etre required',
                'categorie.min' => 'la categorie doit etre superieur du 5 caracteres',
                'description.min' => 'la description doit etre superieur du 10 caracteres',
                'description.required' => 'la description doit required',
                'taillesdesponibles.required' => 'les tailles desponibles doit required',
                'taillesdesponibles.min' => 'la description doit etre superieur du 2 caracteres',
            ];
    }
}
