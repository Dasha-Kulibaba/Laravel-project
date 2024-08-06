<?php

namespace App\Http\Controllers\Grammar;

use App\Models\Grammar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exercises;
use App\Models\GrammarExercises;
use App\Models\GrContents;
use App\Models\Rules;
use App\Rules\IsFile;

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
			"gr_topic" => "required|string|max:255",
			"group_id" => "required",
			'gt_type.*' => 'required|string|in:image,text,audio,rule,exercise',

		]);
		$gram = Grammar::create([
			"gr_topic" => $data['gr_topic'],
			"group_id" => $data['group_id'],
		]);
		$gtTypes = $request->input('gt_type');
		foreach ($gtTypes as $index => $type) {
			switch ($type) {
				case 'text': {
						$content = $request->input('gt_content' . $index);
						$startTag = '<p class="grammar-topic__text">';
						$endTag = '</p>';
						$content = $startTag . $content . $endTag;
					}
					break;
				case 'image': {
						$content = $request->file('gt_content' . $index);
						$filePath = $content->store('images/grammar');
						$startPath = 'storage/app/images/grammar/';
						$content = $startPath . basename($filePath);
					}
					break;
				case 'audio': {
						$content = $request->file('gt_content' . $index);
						$filePath = $content->store('audio/grammar');
						$startPath = 'storage/app/audio/grammar/';
						$content = $startPath . basename($filePath);
					}
					break;
				case 'rule': {
						$rules = $request->input('rule_text' . $index);
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
						$answers = $request->input("ex_answer" . $index);
						$exercise = $request->input("ex_task" . $index);
						$variant1 = $request->input("ex_var" . $index . "_1");
						$variant2 = $request->input("ex_var" . $index . "_2");
						if ($request->input("ex_var" . $index . "_3") !== null) $variant3 = $request->input("ex_var" . $index . "_3");
						else $variant3 = null;

						// for ($i = 0; $i < 3; $i++) {
						// 	if ($request->input('ex_answer' . $index . '_' . ($i + 1)) !== null) {
						// 		$answer = $request->input("ex_var" . $index . "_" . ($i + 1));
						// 		break;
						// 	}
						// }
					}
					break;
			}
			if (isset($content)) {
				GrContents::create([
					'gt_content' => $content,
					'gt_type' => $type,
					'gr_id' => $gram['id'],
				]);
				unset($content);
			}
			if (isset($rules)) {

				Rules::create([
					'rule_text' => $rules,
					'rule_example' => $str,
					'gr_id' => $gram['id'],
				]);
				unset($rules, $str);
			}
			if (isset($exercise)) {
				$ex = Exercises::create([
					'ex_task' => $exercise,
					'ex_var1' => $variant1,
					'ex_var2' => $variant2,
					'ex_var3' => $variant3,
					'ex_answer' => $answers,
				]);
				GrammarExercises::create([
					'ex_id' => $ex['id'],
					'gr_id' => $gram['id'],
				]);
				unset($exercise);
			}
		}

		return redirect()->route('grammar.index');
	}
}
