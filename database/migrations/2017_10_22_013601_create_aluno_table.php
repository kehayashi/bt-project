<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{

    public function up()
    {
      Schema::create('aluno', function (Blueprint $table) {
             $table->increments('id_aluno');
             $table->string('nome');
             $table->string('email')->unique();
             $table->date('data_nascimento');
         });
    }

    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}
