<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Quotes;

class EditController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Books $books)
	{
		$groups = auth()->user()->teacher->groups;
		$quote = Quotes::inRandomOrder()->first();
		return view("books.edit", compact("books", 'groups', 'quote '));
	}
}
