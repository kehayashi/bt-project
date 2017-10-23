<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'aluno' => 'required|not_in:null',
            'cursos' => 'required|not_in:null',
        ];
    }

    public function messages(){
        return [
            'aluno.required' => 'selecione um aluno',
            'cursos.required' => 'selecione um curso',
        ];
    }
}
