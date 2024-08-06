<?php

namespace App\Http\Controllers\Hometasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hometasks;

class DestroyController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Hometasks $hometasks)
	{
		$hometasks->delete();
		$tasks = auth()->user()->teacher->groups;
		return redirect()->route("hometasks.index");
	}
}
