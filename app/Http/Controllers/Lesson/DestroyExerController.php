<?php

namespace App\Http\Controllers\Lesson;

use App\Models\Exercises;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestroyExerController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Exercises $exercises)
	{
		$exer = Exercises::find($exercises->id);
		$lessons = $exer->lessons[0]->id;
		$exercises->delete();
		return redirect()->route('grammar.edit', $lessons);
	}
}
