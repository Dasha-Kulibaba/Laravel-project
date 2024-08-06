<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Books;

class StoreController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$data = $request->validate([
			'book_title' => 'required|string',
			'book_link' => 'required|string',
			'groups' => 'required',
		]);
		$groups = $data['groups'];
		unset($data['groups']);
		$content = $request->file('book_cover');
		$filePath = $content->store('images/books');
		$startPath = 'storage/app/images/books/';
		$data['book_cover'] = $startPath . basename($filePath);
		unset($content, $filePath, $startPath);
		preg_match('/\/d\/(.*?)\//', $data['book_link'], $matches);
		$id = $matches[1];
		$downloadLink = "https://drive.google.com/uc?export=download&id=" . $id;
		$book = Books::create([
			'book_cover' => $data['book_cover'],
			'book_title' => $data['book_title'],
			'book_link' => $data['book_link'],
			'book_download' => $downloadLink,
		]);
		$book->groups()->attach($groups);
		return redirect()->route("books.index");
	}
}
