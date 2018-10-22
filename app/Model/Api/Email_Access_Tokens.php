<?php
	
namespace App\Model\Api;

use Illuminate\Database\Eloquent\Model;

class Email_Access_Tokens extends Model
{
	protected $table = 'email_access_tokens';
	protected $primaryKey = 'id';
	
	public $timestamps = true;
}
