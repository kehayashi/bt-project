<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Aluno;
use App\Curso;
use App\Matricula;
use App\Http\Requests\MatriculaRequest;

Class MatriculaController extends Controller {

  public function listaMatriculas(){

    $alunos = new Aluno();
    $alunos = Aluno::all();

    $cursos = new Curso();
    $cursos = Curso::all();

    $matriculas = new Matricula();
    $matriculas = DB::table('matricula')
					->join('aluno', 'matricula.id_aluno', '=', 'aluno.id_aluno')
					->join('curso', 'matricula.id_curso', '=', 'curso.id_curso')
					->select('nome', 'titulo', 'numero_matricula')
					->get();

    return view('matriculas')
      ->with('alunos', $alunos)
      ->with('cursos', $cursos)
      ->with('matriculas', $matriculas);

  }//end listaCursos

  public function cadastrarMatricula(MatriculaRequest $request){

    for($i=0; $i<count($request->cursos); $i++){
        $matricula = new Matricula();
        $matricula->id_aluno = $request->aluno;
        $matricula->id_curso = $request->cursos[$i];
        $matricula->save();
    }

    return redirect('/matriculas')
        ->withInput();

  }// end cadastraMatricula

  public function excluirMatricula($id){

    $matricula = Matricula::find($id);

    try {
      $matricula->delete();
      $excluido = true;
    }
    catch (Exception $e) {
      $excluido = false;
    }

    return redirect('/matriculas');

  }//end excluirMatricula

}
