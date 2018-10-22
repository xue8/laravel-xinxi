<?php

namespace App\Model\Api;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, Notifiable;

	protected $table = 'users';
	protected $primaryKey = 'id';
	
//	public $timestamps = false;
	
    protected $fillable = [
        'username', 
        'email', 
        'password',
        'signnature',
        'sex',
        'nickname',
        'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}