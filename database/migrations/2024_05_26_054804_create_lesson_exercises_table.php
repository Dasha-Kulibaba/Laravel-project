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
		Schema::create('lesson_exercises', function (Blueprint $table) {
			$table->id('id');
			$table->unsignedBigInteger('les_id');
			$table->unsignedBigInteger('ex_id');
			$table->timestamps();

			$table->index('les_id', 'lesson_exercises_lessons_idx');
			$table->index('ex_id', 'lesson_exercises_exercises_idx');

			$table->foreign('les_id', 'lesson_exercises_lessons_fk')->references('id')->on('lessons')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('ex_id', 'lesson_exercises_ex_fk')->references('id')->on('exercises')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('lesson_exercises');
	}
};
