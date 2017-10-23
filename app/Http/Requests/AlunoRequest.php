<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nome' => 'required|min:3',
            'email' => 'required',
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Informe o nome do aluno',
            'email.required' => 'Informe o email',
        ];
    }
}
