<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Books;

class UpdateController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Books $books)
	{
		$data = $request->validate([
			'book_title' => 'required|string',
			'book_link' => 'required|string',
		]);

		if ($request->file('book_cover') == null) {
			$content = $books->book_cover;
			$data['book_cover'] = $content;
		} else {
			$content = $request->file('book_cover');
			$filePath = $content->store('images/books');
			$startPath = 'storage/app/images/books/';
			$data['book_cover'] = $startPath . basename($filePath);
		}
		unset($content, $filePath, $startPath);
		preg_match('/\/d\/(.*?)\//', $data['book_link'], $matches);
		$id = $matches[1];
		$downloadLink = "https://drive.google.com/uc?export=download&id=" . $id;
		$books->update([
			'book_cover' => $data['book_cover'],
			'book_title' => $data['book_title'],
			'book_link' => $data['book_link'],
			'book_download' => $downloadLink,
		]);
		return redirect()->route("books.index");
	}
}
