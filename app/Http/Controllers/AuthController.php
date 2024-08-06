<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotes;

class AuthController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$quote = Quotes::inRandomOrder()->first();
		if (auth()->user()->student != null) {
			return view('student.index', compact('quote'));
		} else {
			$st = auth()->user()->teacher->groups;
			$students = [];
			foreach ($st as $index => $item) {
				$students[$index] = $item->students;
			}
			if ($students != []) {
				return view('teacher.index', compact('students', 'quote'));
			} else {
				return view('teacher.index', compact('quote'));
			}
		}
		return view('home', compact(compact('quote')));
	}
}
