<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model {

	protected $table = 'matricula';

	protected $primaryKey = 'numero_matricula';

	public $timestamps = false;

	protected $fillable = array(
        'id_curso',
        'id_aluno',
  );

}
