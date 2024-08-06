<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Models\Lessons;
use App\Http\Controllers\Controller;
use App\Models\Quotes;

class indexController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		if (auth()->user()->student !== null) $les = [auth()->user()->student->group];
		else {
			$les = auth()->user()->teacher->groups;
		}
		$quote = Quotes::inRandomOrder()->first();
		return view("lesson.index", compact("les", 'quote'));
	}
}
