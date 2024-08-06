<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exercises;

class DestroyExerFormController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Exercises $exercise)
	{
		$exer = $exercise->id;
		return redirect()->route('lesson.destroyexer', compact('rule'));
	}
}
