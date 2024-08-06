<?php

namespace App\Http\Controllers\Hometasks;

use App\Http\Controllers\Controller;
use App\Models\Hometasks;
use Illuminate\Http\Request;
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
		if (auth()->user()->student != null) $tasks = [auth()->user()->student->group];
		else {
			$tasks = auth()->user()->teacher->groups;
		}
		$quote = Quotes::inRandomOrder()->first();
		return view('hometasks.index', compact('tasks', 'quote'));
	}
}
