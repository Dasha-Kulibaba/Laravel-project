<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = "students";
	protected $guarded = false;

	// public function group()
	// {
	// 	return $this->hasOne(Groups::class, 'group_id', 'id');
	// }

	public function user()
	{
		return $this->hasOne(User::class, 'user_id', 'id');
	}

	public function group()
	{
		return $this->belongsTo(Groups::class, 'group_id', 'id');
	}
}
