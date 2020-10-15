<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'firstname',
		'lastname',
		'patronymic',
		'birthday',
		'group_id'
	];

	public function group()
	{
		return $this->belongsTo('App\Models\Groups', 'group_id');
	}
}
