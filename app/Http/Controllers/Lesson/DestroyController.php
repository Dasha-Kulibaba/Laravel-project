<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lessons;

class DestroyController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Lessons $lesson)
	{
		$lesson->delete();
		$les = auth()->user()->teacher->groups;
		return redirect()->route("lesson.index");
	}
}
