<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model {

	protected $table = 'aluno';

	protected $primaryKey = 'id_aluno';

	public $timestamps = false;

	protected $fillable = array(
        'nome',
				'email',
				'data_nascimento',
  );

}
