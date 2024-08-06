<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\Quotes;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
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
	}
}
