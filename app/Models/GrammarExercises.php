<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrammarExercises extends Model
{
	use HasFactory;
	use SoftDeletes;
	protected $table = 'grammar_exercises';
	protected $guarded = false;

	// public function exercises()
	// {
	// 	return $this->hasMany(Exercises::class, 'ex_id', 'id');
	// }
}
