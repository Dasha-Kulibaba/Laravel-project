<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vocabulary extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'vocabularies';
	protected $guarded = false;

	public function groups()
	{
		return $this->BelongsToMany(Groups::class, 'vocab_groups', 'voc_id', 'group_id');
	}
}
