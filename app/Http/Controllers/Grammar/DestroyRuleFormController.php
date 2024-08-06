<?php

namespace App\Http\Controllers\Grammar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rules;

class DestroyRuleFormController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Rules $rule)
	{
		$rule = $rule->id;
		return redirect()->route('grammar.destroyrule', compact('rule'));
	}
}
