<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'teachers';
	protected $guarded = false;

	public function groups()
	{
		return $this->hasMany(Groups::class, 'teacher_id', 'id');
	}

	public function user()
	{
		return $this->hasOne(User::class, 'user_id', 'id');
	}
}
