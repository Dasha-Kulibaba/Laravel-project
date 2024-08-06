<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grammar extends Model
{
	use HasFactory;
	use SoftDeletes;
	protected $table = 'grammars';
	protected $guarded = false;


	// use SoftDeletes;
	public function contents()
	{
		return $this->HasMany(GrContents::class, 'gr_id', 'id');
	}

	public function exercises()
	{
		return $this->BelongsToMany(Exercises::class, "grammar_exercises", "gr_id", "ex_id");
	}

	public function rules()
	{

		return $this->hasMany(Rules::class, "gr_id", "id");
	}

	public function groups()
	{
		return $this->belongsTo(Groups::class, "group_id", "id");
	}
}
