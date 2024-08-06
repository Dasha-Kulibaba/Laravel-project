<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Groups extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = "groups";
	protected $guarded = false;

	public function students()
	{
		return $this->hasMany(Students::class, "group_id", "id");
	}

	public function grammars()
	{
		return $this->hasMany(Grammar::class, "group_id", "id");
	}

	public function lessons()
	{
		return $this->hasMany(Lessons::class, "group_id", "id");
	}

	public function hometask()
	{
		return $this->hasMany(Hometasks::class, 'group_id', 'id');
	}

	public function vocs()
	{
		return $this->BelongsToMany(Vocabulary::class, 'vocab_groups', 'group_id', 'voc_id');
	}

	public function books()
	{
		return $this->belongsToMany(Books::class, 'group_books', 'group_id', 'book_id');
	}
}
