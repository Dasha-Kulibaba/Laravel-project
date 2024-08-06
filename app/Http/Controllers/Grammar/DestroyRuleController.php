<?php

namespace App\Http\Controllers\Grammar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rules;
use App\Models\Grammar;

class DestroyRuleController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Rules $rule)
	{
		$grammar = Grammar::find($rule->gr_id);
		$rule->delete();
		return redirect()->route('grammar.edit', $grammar);
	}
}
