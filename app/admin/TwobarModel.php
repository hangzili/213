<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class TwobarModel extends Model
{
    protected $table = 'two_bar';
	protected $primaryKey="t_id";
	public $timestamps = false;
	protected $guarded = [];
}
