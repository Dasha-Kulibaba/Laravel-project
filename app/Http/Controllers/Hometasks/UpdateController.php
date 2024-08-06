<?php

namespace App\Http\Controllers\Hometasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hometasks;
use App\Models\StHometasks;

class UpdateController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Hometasks $hometasks)
	{

		$data = $request->validate([
			'task_text' => 'required|string',
			'task_deadline' => 'required',
			'group_id' => 'required',
		]);
		$text = explode(PHP_EOL, $data['task_text']);
		$str = "";
		foreach ($text as $line) {
			$line = "<li>" . $line . "</li>";
			$str .= $line;
		}
		$data['task_text'] = $str;
		unset($text, $str);
		$hometasks->update($data);
		return redirect()->route('hometasks.index');
	}
}
