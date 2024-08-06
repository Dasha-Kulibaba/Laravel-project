<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\Quotes;

class CreateGroupController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$group_name = $request->input('group_name');
		Groups::updateOrCreate([
			'group_name' => $group_name,
			'teacher_id' => auth()->user()->teacher->id,
		], [
			'group_name' => $group_name,
			'teacher_id' => auth()->user()->teacher->id,
		]);
		$quote = Quotes::inRandomOrder()->first();
		return redirect()->route('profile', compact('quote'));
	}
}
