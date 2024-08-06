<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exercises;
use App\Models\LessonContents;
use App\Models\LessonExercises;
use App\Models\Lessons;
use App\Models\Quotes;

class StoreController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$data = $request->validate([
			"les_topic" => "required|string|max:255",
			"group_id" => "required",
			'lc_type.*' => 'required|string|in:image,text,audio,rule,exercise',
			'les_date' => 'required',
		]);
		$les = Lessons::create([
			"les_topic" => $data['les_topic'],
			"group_id" => $data['group_id'],
			'les_date' => $data['les_date'],
		]);
		$lcTypes = $request->input('lc_type');
		foreach ($lcTypes as $index => $type) {
			switch ($type) {
				case 'text': {
						$content = $request->input('lc_content' . $index);
						$startTag = '<p class="lesson-topic__text">';
						$endTag = '</p>';
						$content = $startTag . $content . $endTag;
					}
					break;
				case 'image': {
						$content = $request->file('lc_content' . $index);
						$filePath = $content->store('images/lessons');
						$startPath = 'storage/app/images/lessons/';
						$content = $startPath . basename($filePath);
					}
					break;
				case 'audio': {
						$content = $request->file('lc_content' . $index);
						$filePath = $content->store('audio/lessons');
						$startPath = 'storage/app/audio/lessons/';
						$content = $startPath . basename($filePath);
					}
					break;
				case "exercise": {
						$answers = $request->input("ex_answer" . $index);
						$exercise = $request->input("ex_task" . $index);
						$variant1 = $request->input("ex_var" . $index . "_1");
						$variant2 = $request->input("ex_var" . $index . "_2");
						if ($request->input("ex_var" . $index . "_3") !== null) $variant3 = $request->input("ex_var" . $index . "_3");
						else $variant3 = null;
					}
					break;
			}
			if (isset($content)) {
				$lc = LessonContents::create([
					'lc_content' => $content,
					'lc_type' => $type,
					'les_id' => $les['id'],
					"group_id" => $data['group_id'],
				]);
				unset($content);
			}
			if (isset($exercise)) {
				$ex = Exercises::create([
					'ex_task' => $exercise,
					'ex_var1' => $variant1,
					'ex_var2' => $variant2,
					'ex_var3' => $variant3,
					'ex_answer' => $answers,
				]);
				LessonExercises::create([
					'ex_id' => $ex['id'],
					'les_id' => $les['id'],
				]);
				unset($exercise);
			}
		}
		return redirect()->route('lesson.index');
	}
}
