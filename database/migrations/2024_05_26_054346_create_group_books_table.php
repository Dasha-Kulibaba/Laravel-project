<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_books', function (Blueprint $table) {
			$table->id('id');
			$table->unsignedBigInteger('book_id');
			$table->unsignedBigInteger('group_id');

			$table->timestamps();
			$table->index('book_id', 'group_books_book_idx');
			$table->index('group_id', 'group_books_group_idx');

			$table->foreign('book_id', 'group_books_book_fk')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('group_id', 'group_books_group_fk')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('group_books');
	}
};
