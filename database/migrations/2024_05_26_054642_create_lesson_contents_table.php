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
		Schema::create('lesson_contents', function (Blueprint $table) {
			$table->id('id');
			$table->text('lc_content');
			$table->unsignedBigInteger('les_id');
			$table->string('lc_type', 15);
			$table->unsignedBigInteger('group_id');
			$table->timestamps();

			$table->index('les_id', 'lesson_content_lesson_idx');

			$table->foreign('les_id', 'lesson_content_lesson_fk')->references('id')->on('lessons')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('lesson_contents');
	}
};
