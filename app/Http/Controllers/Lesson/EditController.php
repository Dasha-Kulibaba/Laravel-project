<?php

namespace App\Http\Controllers\Lesson;

use App\Models\Lessons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\Quotes;

class EditController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Lessons $lesson)
	{
		$lessons = Lessons::findOrFail($lesson->id);
		$lc_content = $lessons->contents;
		$groups = auth()->user()->teacher->groups;
		foreach ($lc_content as $item) {
			if ($item->lc_type == "text") {
				$item->lc_content = strip_tags($item->lc_content, '<span>');
				$item->lc_content = ltrim($item->lc_content, "");
				$item->lc_content = rtrim($item->lc_content);
			}
		}
		$exer = $lessons->exercises;
		$index = 0;
		$quote = Quotes::inRandomOrder()->first();
		return view('lesson.edit', compact('lessons', 'groups', 'lc_content', 'exer', 'index', 'quote'));
	}
}
