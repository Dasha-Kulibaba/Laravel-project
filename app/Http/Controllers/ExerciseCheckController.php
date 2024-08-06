<?php

namespace App\Http\Controllers;

use App\Models\Exercises;
use Illuminate\Http\Request;
use App\Models\Quotes;

class ExerciseCheckController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$data = $request->input('exer');
		$tasks = [];
		$stAnswers = [];
		$corAnswers = [];
		$progress = 0;
		foreach ($data as $item => $answer) {
			$tasks[$item] = Exercises::find($answer)->ex_task;
			$stAnswers[$item] =  $request->input('task' . $answer);
			$corAnswers[$item] = Exercises::find($answer)->ex_answer;
			if ($stAnswers[$item] == $corAnswers[$item]) $progress++;
		}
		$quote = Quotes::inRandomOrder()->first();
		return view('check.index', compact('tasks', 'stAnswers', 'corAnswers', 'progress', 'quote'));
	}
}
