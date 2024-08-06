<?php

namespace App\Http\Controllers\Grammar;

use App\Models\Grammar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quotes;

class ShowController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function __invoke(Request $request, Grammar $grammar)
	{
		$gr = Grammar::find($grammar->id);
		$images = $gr->contents;
		$exer = $grammar->exercises;
		$rule = $grammar->rules;
		$quote = Quotes::inRandomOrder()->first();
		return view("grammar.show", compact("gr", 'images', "exer", "rule", 'quote'));
	}
}
