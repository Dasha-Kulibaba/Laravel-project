<?php

namespace App\Http\Controllers\Grammar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\Quotes;

class CreateController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$groups = auth()->user()->teacher->groups;
		$quote = Quotes::inRandomOrder()->first();
		return view("grammar.create", compact("groups", 'quote'));
	}
}
