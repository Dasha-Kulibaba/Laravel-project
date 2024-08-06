<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Models\Lessons;
use App\Http\Controllers\Controller;
use App\Models\Quotes;

class LessonTopicController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Lessons $lesson)
	{
		$lessons = Lessons::find($lesson->id);
		$content = $lessons->contents;
		$exer = $lessons->exercises;
		$quote = Quotes::inRandomOrder()->first();
		return view("lesson.show", compact("lesson", "content", "exer",'quote'));
	}
}
