<?php

namespace App\Http\Controllers\Lesson;

use App\Models\Grammar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lessons;
use App\Models\Quotes;

class ShowController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function __invoke(Request $request, Lessons $lesson)
	{
		$les = Lessons::find($lesson->id);
		$contents = $les->contents;
		$exer = $les->exercises;
		$quote = Quotes::inRandomOrder()->first();
		return view("lesson.show", compact("les", 'contents', "exer", 'quote'));
	}
}
