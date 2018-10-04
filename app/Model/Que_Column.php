<?php
	
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Que_Column extends Model
{
	protected $table = 'que_column';
	protected $primaryKey = 'id';
	
	public $timestamps = false;
}
