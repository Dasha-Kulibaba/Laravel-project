<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class StudentAvatarUpdateController extends Controller
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
		$filePath = $avatar->store('images/students');
		$startPath = 'storage/app/images/students/';
		$avatar = $startPath . basename($filePath);
		auth()->user()->student->update([
			'st_avatar' => $avatar
		]);
		return redirect()->route('profile');
	}
}
