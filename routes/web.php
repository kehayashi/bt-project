<?php

Route::get('/', function () {
    return view('template_main');
});

//CURSOS

Route::get('/cursos', 'CursoController@listaCursos');

Route::post('/cursos/cadastrar', 'CursoController@cadastrarCurso');

Route::get('/cursos/excluir/{id}', 'CursoController@excluirCurso');

Route::get('/cursos/editar/{id}', 'CursoController@editarCurso');

Route::post('/cursos/alterar', 'CursoController@alterarCurso');

//END CURSOS


//ALUNOS

Route::get('/alunos', 'AlunoController@listaAlunos');

Route::post('/alunos/cadastrar', 'AlunoController@cadastrarAluno');

Route::get('/alunos/excluir/{id}', 'AlunoController@excluirAluno');

Route::get('/alunos/editar/{id}', 'AlunoController@editarAluno');

Route::post('/alunos/alterar', 'AlunoController@alterarAluno');


//END ALUNOS


//MATRICULAS

Route::get('/matriculas', 'MatriculaController@listaMatriculas');

Route::post('/matriculas/cadastrar', 'MatriculaController@cadastrarMatricula');

Route::get('/matriculas/excluir/{id}', 'MatriculaController@excluirMatricula');

Route::get('/matriculas/editar/{id}', 'MatriculaController@editarMatricula');

Route::post('/matriculas/alterar', 'MatriculaController@alterarMatricula');

//ED MATRICULAS
