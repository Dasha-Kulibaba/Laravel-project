<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrContents extends Model
{
	use HasFactory;
	use SoftDeletes;
	protected $table = 'gr_contents';
	protected $guarded = false;

	public function grammar()
	{
		return $this->belongsTo(Grammar::class, 'gr_id', 'id');
	}
}
