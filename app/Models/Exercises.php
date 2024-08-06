<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Exercises extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'exercises';
	protected $guarded = false;

	// public function lessons()
	// {
	// 	return $this->BelongsTo(Lessons::class, 'les_id', 'id');
	// }

	public function lessons()
	{
		return $this->BelongsToMany(Exercises::class, "lesson_exercises", "ex_id", "les_id");
	}

	public function grammar()
	{
		return $this->BelongsToMany(Grammar::class, "grammar_exercises", "ex_id", "gr_id");
	}
}
