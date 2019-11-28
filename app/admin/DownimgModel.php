<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class DownimgModel extends Model
{
    protected $table = 'down_img';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
