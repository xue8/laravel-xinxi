<?php
	
namespace App\Model\Api;

use Illuminate\Database\Eloquent\Model;

class Oauth_Access_Tokens extends Model
{
	protected $table = 'oauth_access_tokens';
	protected $primaryKey = 'id';
	
	public $timestamps = false;
}
