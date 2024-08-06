<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonExercises extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'lesson_exercises';
	protected $guarded = false;

	// public function lessons()
	// {
	// 	return $this->belongsTo(Lessons::class, "les_id", "id");
	// }
}
