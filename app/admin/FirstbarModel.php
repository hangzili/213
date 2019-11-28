<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class FirstbarModel extends Model
{
    protected $table = 'first_bar';
	protected $primaryKey="f_id";
	public $timestamps = false;
	protected $guarded = [];
}
