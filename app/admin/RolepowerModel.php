<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class RolepowerModel extends Model
{
    protected $table = 'role_power';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
