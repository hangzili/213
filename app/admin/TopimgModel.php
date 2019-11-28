<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class TopimgModel extends Model
{
    protected $table = 'top_img';
	protected $primaryKey="i_id";
	public $timestamps = false;
	protected $guarded = [];
}
