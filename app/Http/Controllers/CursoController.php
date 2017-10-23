<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Curso;
use App\Http\Requests\CursoRequest;

Class CursoController extends Controller {

  public function listaCursos(){

    $cursos = Curso::all();

    return view('cursos')
      ->with('cursos', $cursos);

  }//end listaCursos

  public function cadastrarCurso(CursoRequest $request){

    $curso = new Curso();
    $curso->titulo = $request->titulo;
    $curso->descricao = $request->descricao;

    try {
      $curso->save();
      $cadastrado = true;
    }
    catch (Exception $e) {
      $cadastrado = false;
    }

    return redirect('/cursos')
      ->withInput();

  }//end cadastrarCurso

  public function excluirCurso($id){

    $curso = Curso::find($id);

    try {
      $curso->delete();
      $excluido = true;
    }
    catch (Exception $e) {
      $excluido = false;
    }

    return redirect('/cursos')
      ->withInput();
  }//end excluirCurso

  public function editarCurso($id){

    $curso = Curso::find($id);

    return view('cursosEditar')
      ->with('curso', $curso);

  }//end editarCurso

  public function alterarCurso(CursoRequest $request){

    $curso = Curso::find($request->id_curso);
    $curso->titulo = $request->titulo;
    $curso->descricao = $request->descricao;

    try {
      $curso->save();
      $cadastrado = true;
    }
    catch (Exception $e) {
      $cadastrado = false;
    }

    return redirect('/cursos')
      ->withInput();

  }//end alterarCurso

}
