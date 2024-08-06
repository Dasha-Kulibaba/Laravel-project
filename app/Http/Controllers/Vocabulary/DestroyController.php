<?php

namespace App\Http\Controllers\Vocabulary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vocabulary;

class DestroyController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Vocabulary $vocabulary)
	{
		$vocabulary->delete();
		// $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		// $alphabet = mb_str_split($letters);
		// $vocab = auth()->user()->teacher->groups;
		return redirect()->route("vocabulary.index");
	}
}
