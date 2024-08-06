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
		Schema::create('hometasks', function (Blueprint $table) {
			$table->id('id');
			$table->string('task_text');
			$table->date('task_deadline');
			$table->unsignedBigInteger('group_id');
			$table->timestamps();
			$table->softDeletes();

			$table->index('group_id', 'hometasks_groups_idx');
			$table->foreign('group_id', 'hometasks_groups_fk')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('hometasks');
	}
};
