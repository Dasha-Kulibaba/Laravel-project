<?php

namespace App\Http\Controllers\Hometasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hometasks;
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
	public function __invoke(Request $request, Hometasks $hometasks)
	{
		$task = Hometasks::findOrFail($hometasks->id);
		$task->task_text = str_replace('</li>', PHP_EOL, $task->task_text);
		$task->task_text = strip_tags($task->task_text);
		$groups = Groups::all();
		$quote = Quotes::inRandomOrder()->first();
		return view("hometasks.edit", compact("task", 'groups', 'quote'));
	}
}
