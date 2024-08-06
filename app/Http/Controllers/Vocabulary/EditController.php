<?php

namespace App\Http\Controllers\Vocabulary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\Vocabulary;
use App\Models\Quotes;

class EditController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Vocabulary $vocabulary)
	{
		$vocabulary->voc_example = str_replace('</li>', PHP_EOL, $vocabulary->voc_example);
		$vocabulary->voc_example = strip_tags($vocabulary->voc_example);
		$groups =  auth()->user()->teacher->groups;
		$quote = Quotes::inRandomOrder()->first();
		return view("vocabulary.edit", compact("vocabulary", 'groups', 'quote'));
	}
}
