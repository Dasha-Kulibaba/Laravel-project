<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hometasks extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'hometasks';
	protected $guarded = false;

	public function group()
	{
		return $this->belongsTo(Groups::class, 'group_id', 'id');
	}
}
