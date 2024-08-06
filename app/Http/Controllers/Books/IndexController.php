<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Groups;
use App\Models\Quotes;

class IndexController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		if (auth()->user()->student != null) $books = [auth()->user()->student->group];
		else {
			$books = auth()->user()->teacher->groups;
		}
		$quote = Quotes::inRandomOrder()->first();
		return view("books.index", compact("books", 'quote'));
	}
}
