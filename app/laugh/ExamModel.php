<?php

namespace App\laugh;

use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    protected $table = 'laugh';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $guarded = [];
}
