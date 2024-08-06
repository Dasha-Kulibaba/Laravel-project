<?php

namespace App\Http\Controllers\Vocabulary;

use App\Http\Controllers\Controller;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use App\Models\Quotes;

class IndexController extends Controller
{

	//
	public function __invoke(Request $request)
	{
		$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$alphabet = mb_str_split($letters);
		if (auth()->user()->student != null) {
			$vocab = [auth()->user()->student->group];
		} else {
			$vocab = auth()->user()->teacher->groups;
		}
		$quote = Quotes::inRandomOrder()->first();
		return view("vocabulary.index", compact("alphabet", "vocab", 'quote'));
	}
}
