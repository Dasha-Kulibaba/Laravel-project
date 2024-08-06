<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeacherAvatarUpdateController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$avatar = $request->file('avatar');
		$filePath = $avatar->store('images/teachers');
		$startPath = 'storage/app/images/teachers/';
		$avatar = $startPath . basename($filePath);
		auth()->user()->teacher->update([
			'teacher_avatar' => $avatar
		]);
		return redirect()->route('profile');
	}
}
