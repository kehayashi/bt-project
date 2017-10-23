@extends('template_main')

@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-search"></i> Matrículas
      <small>cadastrados</small>
    </h1>
  </section>
  <br>
  <!-- Main content -->
  <section class="content">
    @if(isset($error))
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Erro ao excluir matrícula!</h4>
              </div>
              <!-- end alert -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    @endif

    @if(isset($excluido))
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Matrícula excluída com sucesso!</h4>
              </div>
              <!-- end alert -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    @endif

    @if((old('id_aluno')) && (count($errors) <= 0))
       <div class="alert alert-success">
          <i class="fa fa-check"></i>Aluno foi cadastrado com sucesso!
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary" style="background-color: #f2f2f2;">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list-ol"></i> Matrículas cadastradas
                <small>pesquisa por: Código, aluno ou curso</small>
              </h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                          <tr role="row" style="background-color: #222d32;">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 296.71875px; color: #f2f2f2;">Codigo da matrícula
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361.03125px; color: #f2f2f2;">Aluno
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 321.546875px; color: #f2f2f2;">Curso
                            </th>
                            <th colspstyle="width: 256.453125px;" style="width: 40px; color: #f2f2f2;">Excluir
                            </th>
                          </tr>
                        </thead>
                        <!-- end thead -->
                        <tbody>
                          @foreach ($matriculas as $m)
                            <tr role="row" class="odd">
                              <td class="sorting_1"><span class="label label-info" style="font-size: 15px;">{{ $m->numero_matricula }}</span></td>
                              <td>{{ $m->nome}}</td>
                              <td>{{ $m->titulo }}</td>
                              <td class="text-center">
                                <span class="label label-danger" style="font-size: 15px;">
                                  <a href="#" data-toggle="modal" id="{{ $m->numero_matricula }}" onclick="idModal(this.id)">
                                    <i class="fa fa-trash-o" style="color: white;"></i>
                                  </a>
                                </span>
                              </td>
                            </tr>
                            <!-- end tr -->
                          @endforeach
                          <tfoot>
                            <tr>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                            </tr>
                            <!-- end tr -->
                          </tfoot>
                          <!-- end tfoot -->
                      </tbody>
                      <!-- end tbody -->
                    </table>
                    <!-- end table -->
                  </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end wrapper -->
          </div>
          <!-- end box-body -->
        </div>
        <!-- end box -->
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-success form-control" data-toggle="modal" data-target="#myModal2">Realizar nova matrícula</button>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </section>
  <!-- end section -->
</div>
<!-- end tab-content -->

<!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #f2f2f2;">
          <div class="modal-header" style="background-color: #f2f2f2;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Realizar matrículas</h4>
          </div>
          <form action="/matriculas/cadastrar" method="post">
            <div class="modal-body">
                <div class="box box-primary" style="background-color: #f2f2f2;">
                    <div class="box-header with-border">
                        <h1 class="box-title">Matrícula <small>informações</small></h1>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <b>Aluno:</b><br>
                                        <select class="form-control" name="aluno">
                                          <option value="null">Selecione</option>
                                          @foreach ($alunos as $a)
                                            <option value="{{ $a->id_aluno }}">{{ $a->nome }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end form group -->
                            </div>
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <b>Cursos:</b><br>
                                        <div class="form-group">
                                          <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Cursos" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cursos[]">
                                            <option value="null">Selecione</option>
                                            @foreach ($cursos as $c)
                                              <option value="{{ $c->id_curso }}">{{ $c->titulo }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- form group -->
                            </div>
                        </div>
                        <!-- end box body -->
                    </div>
                    <!-- end box header -->
                </div>
                <!-- end box warning -->
            </div>
            <!-- end modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar <i class="fa fa-close"></i></button>
                <button type="submit" class="btn btn-success">Cadastrar <i class="fa fa-check"></i></button>
            </div>
            <!-- modal footer -->
        </form>
        <!-- end form -->
        </div>
        <!-- modal content -->
      </div>
      <!-- modal dialog -->
    </div>
    <!-- end modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle" style="color: #FFD700;"></i> <b>Confirmação</b></h4>
          </div>
          <!-- end modal-header -->
            <div class="modal-body">
              <h4 class="box-title text-center"></h4>
              <!-- end box-info -->
            </div>
            <!-- end modal-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Não, cancelar <i class="fa fa-close"></i></button>
              <a id="excluirProp"><button type="button" class="btn btn-success">Sim, excluir <i class="fa fa-check"></i></button></a>
            </div>
            <!-- end modal-footer -->
        </div>
        <!-- end modal-content -->
      </div>
      <!-- end modal-dialog -->
  </div>
  <!-- end modal -->

  <script>
    function idModal(id){
      var html = '<span class="label label-info" style="font-size: 16px;">'+ id +'</span>';
       $('.box-title').text('Deseja excluir matrícula de código: ');
       $('.box-title').append(html);
       $('#excluirProp').attr("href", "/matriculas/excluir/"+id);
       $('#myModal').modal('show');
    }
  </script>

<script>
  $(function () {
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
		    	    "sEmptyTable": "Nenhum registro encontrado",
		    	    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		    	    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		    	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
		    	    "sInfoPostFix": "",
		    	    "sInfoThousands": ".",
		    	    "sLengthMenu": "_MENU_ resultados por página",
		    	    "sLoadingRecords": "Carregando...",
		    	    "sProcessing": "Processando...",
		    	    "sZeroRecords": "Nenhum registro encontrado",
		    	    "sSearch": "Pesquisar",
		    	    "oPaginate": {
		    	        "sNext": "Próximo",
		    	        "sPrevious": "Anterior",
		    	        "sFirst": "Primeiro",
		    	        "sLast": "Último"
		    	    },
		    	    "oAria": {
		    	        "sSortAscending": ": Ordenar colunas de forma ascendente",
		    	        "sSortDescending": ": Ordenar colunas de forma descendente"
		    	    }
		    	}
        });
  });
</script>

<!-- SELECT COM BUSCA -->
<script>
  $(function () {
    $(".select2").select2();
  });
</script>
<!-- END SELECT COM BUSCA-->

@stop

<!-- /.content-wrapper -->
