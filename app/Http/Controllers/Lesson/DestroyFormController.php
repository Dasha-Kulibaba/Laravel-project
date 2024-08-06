<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LessonContents;
use App\Models\Quotes;

class DestroyFormController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, LessonContents $lcContents)
	{
		$lcContent = $lcContents->id;
		$quote = Quotes::inRandomOrder()->first();
		return view('lesson.destroyContent', compact('lcContent', 'quote'));
	}
}
