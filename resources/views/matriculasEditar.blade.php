@extends('template_main')

@section('conteudo')


<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <section class="content-header">
    <h1>
      <i class="fa fa-search"></i> Editar
      <small>Matrículas</small>
    </h1>
  </section>
  <br>

  <div class="container">
    <div class="row">
      <form action="/alunos/alterar" method="post">
        <div class="col-lg-2">
        </div>
        <!-- end col -->
        <div class="col-md-7">
          <div class="row">
              <div class="form-group-row">
                  <div class="col-lg-12">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="id_aluno" value="{{ $aluno->id_aluno }}">
                      <b>Nome:</b><br>
                      <input class="form-control" name="nome" placeholder="nome" value="{{ $aluno->nome }}">
                  </div>
                  <!-- end col -->
              </div>
              <!-- end form group -->
          </div>
          <div class="row">
              <div class="form-group-row">
                  <div class="col-lg-12">
                      <b>Email:</b><br>
                      <input type="email" class="form-control" name="email" value="{{ $aluno->email }}">
                  </div>
                  <!-- end col -->
              </div>
              <!-- form group -->
          </div>
          <div class="row">
              <div class="form-group-row">
                  <div class="col-lg-12">
                      <b>Data nascimento:</b><br>
                      <input type="text" class="form-control" name="data_nascimento" maxlength = "10" onkeyup = "barra(this)" value="{{ date('d-m-Y', strtotime($aluno->data_nascimento)) }}">
                      <br>
                      <button type="submit" class="btn btn-success form-control">Alterar</button>
                  </div>
                  <!-- end col -->
              </div>
              <!-- form group -->
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-3">
        </div>
        <!-- end col -->
      </form>
      <!-- end form -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->

</div>
<!-- end wrapper -->



@stop
