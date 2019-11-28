<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class ContentModel extends Model
{
    protected $table = 'content';
	protected $primaryKey="c_id";
	public $timestamps = false;
	protected $guarded = [];
}
