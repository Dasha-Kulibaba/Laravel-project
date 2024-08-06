<?php

namespace App\Http\Controllers\Vocabulary;

use App\Models\Vocabulary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\Quotes;

class CreateController extends Controller
{

	public function __invoke(Request $request)
	{
		$voc = Vocabulary::all();
		$groups = Groups::all();
		$quote = Quotes::inRandomOrder()->first();
		return view('vocabulary.create', compact('voc', 'groups', 'quote'));
	}
}
