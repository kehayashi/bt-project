<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Aluno;
use App\Http\Requests\AlunoRequest;

Class AlunoController extends Controller {

  public function listaAlunos(){

    $alunos = Aluno::all();

    return view('alunos')
      ->with('alunos', $alunos);

  }//end listaCursos

  public function cadastrarAluno(AlunoRequest $request){

    $aluno = new Aluno();
    $aluno->nome = $request->nome;
    $aluno->email = $request->email;
    $dateformat = date_create($request->data_nascimento);
    $data_nascimento = date_format($dateformat, 'Y-m-d');
    $aluno->data_nascimento = $data_nascimento;

    try {
      $aluno->save();
      $cadastrado = true;
    }
    catch (Exception $e) {
      $cadastrado = false;
    }

    return redirect('/alunos')
        ->withInput();

  }//end cadastrarCurso

  public function excluirAluno($id){

    $aluno = Aluno::find($id);

    try {
      $aluno->delete();
      $excluido = true;
    }
    catch (Exception $e) {
      $excluido = false;
    }

    return redirect('/alunos')
        ->withInput();

  }//end excluir aluno

  public function editarAluno($id){

    $aluno = Aluno::find($id);

    return view('alunosEditar')
      ->with('aluno', $aluno);

  }//end editar aluno


  public function alterarAluno(AlunoRequest $request){

    $aluno = Aluno::find($request->id_aluno);

    $aluno->nome = $request->nome;
    $aluno->email = $request->email;
    $dateformat = date_create($request->data_nascimento);
    $data_nascimento = date_format($dateformat, 'Y-m-d');
    $aluno->data_nascimento = $data_nascimento;

    try {
      $aluno->save();
      $cadastrado = true;
    }
    catch (Exception $e) {
      $cadastrado = false;
    }

    return redirect('/alunos')
        ->withInput();

  }//end alterar aluno

}
