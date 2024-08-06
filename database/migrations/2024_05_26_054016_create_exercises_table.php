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
		Schema::create('exercises', function (Blueprint $table) {
			$table->id('id');
			$table->char('ex_task', 100);
			$table->char('ex_var1', 25);
			$table->char('ex_var2', 25);
			$table->char('ex_var3', 25)->nullable();
			$table->char('ex_answer', 25);
			$table->timestamps();
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
		Schema::dropIfExists('exercises');
	}
};
