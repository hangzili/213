<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'admin_user';
	protected $primaryKey="u_id";
	public $timestamps = false;
	protected $guarded = [];
}
