<?php
	
namespace App\Model\Api;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
	protected $table = 'que_comment';
	protected $primaryKey = 'id';
	
	public $timestamps = true;
}
