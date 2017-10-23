<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'titulo' => 'required|min:3',
        ];
    }

    public function messages(){
        return [
            'titulo.required' => 'Informe o título',
        ];
    }
}
