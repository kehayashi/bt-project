<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration
{

    public function up()
    {
      Schema::create('curso', function (Blueprint $table) {
          $table->increments('id_curso');
          $table->string('titulo');
          $table->string('descricao');
      });
    }

    public function down()
    {
        Schema::dropIfExists('curso');
    }
}
