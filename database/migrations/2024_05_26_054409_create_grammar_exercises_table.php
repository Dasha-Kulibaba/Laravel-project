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
		Schema::create('grammar_exercises', function (Blueprint $table) {
			$table->id('id');
			$table->unsignedBigInteger('ex_id');
			$table->unsignedBigInteger('gr_id');

			$table->timestamps();

			$table->index('ex_id', 'grammar_exercises_ex_idx');
			$table->index('gr_id', 'grammar_exercises_gr_idx');

			$table->foreign('ex_id', 'grammar_exercises_ex_fk')->references('id')->on('exercises')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('gr_id', 'grammar_exercises_gr_fk')->references('id')->on('grammars')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('grammar_exercises');
	}
};
