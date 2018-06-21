<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conseiller extends Model
{
	protected $table = 'conseiller';

	
	protected $fillable = ['nom','email','sresponsable_id'];
}
