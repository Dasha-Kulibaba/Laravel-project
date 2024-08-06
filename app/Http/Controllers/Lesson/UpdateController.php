<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Exercises;
use App\Models\LessonExercises;
use App\Models\LessonContents;
use App\Models\Lessons;

class UpdateController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Lessons $lesson,)
	{
		$data = $request->validate([
			"les_topic" => "required|string|max:255",
			"group_id" => "required",
			'lc_type.*' => 'required|string|in:image,text,audio,exercise',
			'les_date' => "required",
		]);
		$lesson->update([
			"les_topic" => $data['les_topic'],
			"group_id" => $data['group_id'],
			'les_date' => $data['les_date']
		]);
		$lcTypes = $request->input('lc_type');
		foreach ($lcTypes as $index => $type) {
			switch ($type) {
				case 'text': {
						$content = $request->input('lc_content' . $index);
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$startTag = '<p class="lesson-topic__text">';
						$endTag = '</p>';
						$content = $startTag . $content . $endTag;
					}
					break;
				case 'image': {
						$content = $request->file('lc_content' . $index);
						if ($content == null) break;
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$filePath = $content->store('images/lessons');
						$startPath = 'storage/app/images/lessons/';
						$content = $startPath . basename($filePath);
					}
					break;
				case 'audio': {
						$content = $request->file('lc_content' . $index);
						if ($content == null) break;
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$filePath = $content->store('audio/lessons');
						$startPath = 'storage/app/audio/lessons/';
						$content = $startPath . basename($filePath);
					}
					break;
				case "exercise": {
						$answers = $request->input("ex_answer" . $index);
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$exercise = $request->input("ex_task" . $index);
						$variant1 = $request->input("ex_var" . $index . "_1");
						$variant2 = $request->input("ex_var" . $index . "_2");
						if ($request->input("ex_var" . $index . "_3") !== null) $variant3 = $request->input("ex_var" . $index . "_3");
						else $variant3 = null;
					}
					break;
			}
			if (isset($content)) {
				if (isset($id)) {
					LessonContents::updateOrCreate([
						'id' => $id,
						'lc_type' => $type,
						'les_id' => $lesson['id'],
						"group_id" => $data['group_id'],
					], [
						'lc_content' => $content,
						'lc_type' => $type,
						'les_id' => $lesson['id'],
						"group_id" => $data['group_id'],
					]);
				} else {
					LessonContents::create([
						'lc_content' => $content,
						'lc_type' => $type,
						'les_id' => $lesson['id'],
						"group_id" => $data['group_id'],
					]);
				}
				unset($content, $id);
			}
			if (isset($exercise)) {
				if (isset($id)) {
					$ex = Exercises::updateOrCreate([
						'id' => $id,
					], [
						'ex_task' => $exercise,
						'ex_var1' => $variant1,
						'ex_var2' => $variant2,
						'ex_var3' => $variant3,
						'ex_answer' => $answers,
					]);
				} else {
					$ex = Exercises::create([
						'ex_task' => $exercise,
						'ex_var1' => $variant1,
						'ex_var2' => $variant2,
						'ex_var3' => $variant3,
						'ex_answer' => $answers,
					]);
				}
				LessonExercises::updateOrCreate([
					'ex_id' => $ex['id'],
					'les_id' => $lesson['id'],
				], [
					'ex_id' => $ex['id'],
					'les_id' => $lesson['id'],
				]);
				unset($exercise, $id);
			}
		}

		return redirect()->route('lesson.index');
	}
}
