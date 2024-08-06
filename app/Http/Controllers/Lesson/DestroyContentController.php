<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LessonContents;
use App\Models\Lessons;

class DestroyContentController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, LessonContents $lcContent)
	{
		$lesson = Lessons::findOrFail($lcContent->les_id);
		$lcContent->delete();
		return redirect()->route("lesson.edit", $lesson);
	}
}
