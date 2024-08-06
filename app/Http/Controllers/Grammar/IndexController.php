<?php

namespace App\Http\Controllers\Grammar;

use App\Models\Grammar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quotes;

class IndexController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		if (auth()->user()->student !== null) $grammar = [auth()->user()->student->group];
		else {
			$grammar = auth()->user()->teacher->groups;
		}
		$quote = Quotes::inRandomOrder()->first();
		return view("grammar.index", compact("grammar", 'quote'));
	}
}
