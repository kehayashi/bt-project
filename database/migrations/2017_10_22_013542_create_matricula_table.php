<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaTable extends Migration
{

    public function up()
    {
      Schema::create('matricula', function (Blueprint $table) {
          $table->increments('numero_matricula');
          $table->bigInteger('id_curso');
          $table->bigInteger('id_aluno');
      });
    }

    public function down()
    {
        Schema::dropIfExists('matricula');
    }
}
