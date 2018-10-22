<?php
	
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Que_Column extends Model
{
	protected $table = 'que_column';
	protected $primaryKey = 'id';
	
	public $timestamps = false;
	
	public function question()
	{
		return $this->hasMany('App\Model\Que_Question', 'id', 'cnid');
	}	
}
