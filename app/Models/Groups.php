<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'number',
		'course',
		'faculty_name'
	];

	public function students()
	{
		return $this->hasMany('App\Models\Students', 'group_id');
	}
}
