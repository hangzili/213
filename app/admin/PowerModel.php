<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class PowerModel extends Model
{
    protected $table = 'power';
	protected $primaryKey="p_id";
	public $timestamps = false;
	protected $guarded = [];
}
