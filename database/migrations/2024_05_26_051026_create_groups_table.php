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
		Schema::create('groups', function (Blueprint $table) {
			$table->id('id');
			$table->char('group_name', 20);
			$table->unsignedBigInteger('teacher_id')->nullable();
			$table->timestamps();
			$table->index('teacher_id', 'group_teacher_idx');
			$table->foreign('teacher_id', 'group_teacher_fk')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('groups');
	}
};
