<?php

namespace App\Http\Controllers\Grammar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GrContents;
use App\Models\Rules;
use App\Models\Quotes;

class DestroyFormController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, GrContents $grContents, Rules $rule)
	{
		$grContent = $grContents->id;
		$quote = Quotes::inRandomOrder()->first();
		return view('grammar.destroyContent', compact('grContent', 'quote'));
	}
}
