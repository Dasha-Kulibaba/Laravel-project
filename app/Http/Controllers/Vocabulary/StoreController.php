<?php

namespace App\Http\Controllers\Vocabulary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vocabulary;

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
			"voc_word" => "required|string|max:255",
			"voc_explain" => "required|string|max:255",
			'voc_example' => 'required|string|max:255',
			'groups' => 'required',
		]);
		$groups = $data['groups'];
		unset($data['groups']);
		$example = explode(PHP_EOL, $data['voc_example']);
		$str = "";
		foreach ($example as $item) {
			$item = "<li>" . $item . "</li>";
			$str .= $item;
		}
		$data['voc_example'] = $str;
		unset($example, $str);
		$voc = Vocabulary::create($data);
		$voc->groups()->attach($groups);
		return redirect()->route('vocabulary.index');
	}
}
