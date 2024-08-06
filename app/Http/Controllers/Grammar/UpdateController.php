<?php

namespace App\Http\Controllers\Grammar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GrContents;
use App\Models\Grammar;
use App\Models\Rules;
use App\Models\Exercises;
use App\Models\GrammarExercises;

class UpdateController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Grammar $grammar, GrContents $grContents)
	{
		$data = $request->validate([
			"gr_topic" => "required|string|max:255",
			"group_id" => "required",
			'gt_type.*' => 'required|string|in:image,text,audio,rule,exercise',

		]);
		$grammar->update([
			"gr_topic" => $data['gr_topic'],
			"group_id" => $data['group_id'],

		]);
		$gtTypes = $request->input('gt_type');
		foreach ($gtTypes as $index => $type) {
			switch ($type) {
				case 'text': {
						$content = $request->input('gt_content' . $index);
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$startTag = '<p class="grammar-topic__text">';
						$endTag = '</p>';
						$content = $startTag . $content . $endTag;
					}
					break;
				case 'image': {
						$content = $request->file('gt_content' . $index);
						if ($content == null) break;
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$filePath = $content->store('images/grammar');
						$startPath = 'storage/app/images/grammar/';
						$content = $startPath . basename($filePath);
					}
					break;
				case 'audio': {
						$content = $request->file('gt_content' . $index);
						if ($content == null) break;
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$filePath = $content->store('audio/grammar');
						$startPath = 'storage/app/audio/grammar/';
						$content = $startPath . basename($filePath);
					}
					break;
				case 'rule': {
						$rules = $request->input('rule_text' . $index);
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
						$examples = $request->input('rule_example' . $index);
						$example = explode(PHP_EOL, $examples);
						$str = "";
						foreach ($example as $item) {
							$item = "<li>" . $item . "</li>";
							$str .= $item;
						}
					}
					break;
				case "exercise": {
						if ($request->input('id' . $index) !== null) $id = $request->input('id' . $index);
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
				if (isset($id)) {
					GrContents::updateOrCreate([
						'id' => $id,
						'gt_type' => $type,
						'gr_id' => $grammar['id'],
					], [
						'gt_content' => $content,
						'gt_type' => $type,
						'gr_id' => $grammar['id'],
					]);
				} else {
					GrContents::create([
						'gt_content' => $content,
						'gt_type' => $type,
						'gr_id' => $grammar['id'],
					]);
				}

				unset($content, $id);
			}
			if (isset($rules)) {
				if (isset($id)) {
					Rules::updateOrCreate([
						'id' => $id,
						'gr_id' => $grammar['id'],

					], [
						'rule_text' => $rules,
						'rule_example' => $str,
						'gr_id' => $grammar['id'],
					]);
				} else {
					Rules::create([
						'rule_text' => $rules,
						'rule_example' => $str,
						'gr_id' => $grammar['id'],
					]);
				}

				unset($rules, $str, $id);
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
				GrammarExercises::updateOrCreate([
					'ex_id' => $ex['id'],
					'gr_id' => $grammar['id'],
				], [
					'ex_id' => $ex['id'],
					'gr_id' => $grammar['id'],
				]);
				unset($exercise, $id);
			}
		}
		return redirect()->route('grammar.index');
	}
}
