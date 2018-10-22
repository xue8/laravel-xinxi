<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Que_Question extends Model
{
	protected $table = 'que_question';
	protected $id = 'id';
	
	public $timestamps = true;
	
	public function user()
	{
		return $this->hasOne('App\Model\Api\User', 'id', 'uid');
	}
	
	public function content()
	{
		return $this->hasOne('App\Model\Que_Content', 'id', 'cid');
	}	

	public function column()
	{
		return $this->hasOne('App\Model\Que_Column', 'id', 'cnid');
	}		
}