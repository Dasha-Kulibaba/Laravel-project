<?php

namespace App\Http\Controllers\Grammar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grammar;

class DestroyController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Grammar $grammar)
	{
		$grammar->delete();
		return redirect()->route("grammar.index");
	}
}
