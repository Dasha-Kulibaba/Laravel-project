<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rules extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'rules';
	protected $guarded = false;

	public function grammar()
	{
		return $this->belongsTo(Grammar::class, 'gr_id', 'id');
	}
}
