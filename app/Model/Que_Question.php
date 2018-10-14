<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Que_Question extends Model
{
	protected $table = 'que_question';
	protected $id = 'id';
	
	public $timestamps = true;
	
	public function User()
	{
		return $this->belongsTo('App\Model\Api\User', 'uid', 'id');
	}
}