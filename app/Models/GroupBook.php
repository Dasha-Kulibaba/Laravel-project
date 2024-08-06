<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupBook extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = "group_books";
	protected $fillable = false;
}
