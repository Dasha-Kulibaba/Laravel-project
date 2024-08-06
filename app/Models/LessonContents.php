<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonContents extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'lesson_contents';
	protected $guarded = false;

	public function lesson()
	{
		return $this->belongsTo(Lessons::class, "les_id", "id");
	}
}
