<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'books';
	protected $guarded = false;

	public function groups()
	{
		return $this->belongsToMany(Groups::class, 'group_books', 'book_id', 'group_id');
	}
}
