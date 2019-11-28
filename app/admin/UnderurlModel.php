<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class UnderurlModel extends Model
{
    protected $table = 'underurl';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
