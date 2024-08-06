<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VocabGroups extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'vocab_groups';
	protected $fillable = false;
}
