<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lessons extends Model
{
	use HasFactory;
	use SoftDeletes;
	protected $table = 'lessons';
	protected $guarded = false;


	public function groups()
	{
		return $this->belongsTo(Groups::class, "group_id", "id");
	}

	public function contents()
	{
		return $this->hasMany(LessonContents::class, "les_id", "id");
	}

	public function exercises()
	{
		return $this->BelongsToMany(Exercises::class, "lesson_exercises", "les_id", "ex_id");
	}

	public function lesson()
	{
		return $this->belongsTo(Groups::class, "group_id", "id");
	}
}
