<?php

namespace App\Http\Controllers\Grammar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grammar;
use App\Models\GrContents;

class DestroyContentController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, GrContents $grContent)
	{
		$grammar = Grammar::findOrFail($grContent->gr_id);
		$grContent->delete();
		return redirect()->route("grammar.edit", $grammar);
	}
}
