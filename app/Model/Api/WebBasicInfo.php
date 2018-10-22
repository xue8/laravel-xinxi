<?php
	
namespace App\Model\Api;

use Illuminate\Database\Eloquent\Model;

class WebBasicInfo extends Model
{
	protected $table = 'webbasicinfo';
	protected $primaryKey = 'id';
	
	public $timestamps = true;
}
