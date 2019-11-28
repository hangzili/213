<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class UserroleModel extends Model
{
    protected $table = 'user_role';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
