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
		Schema::create('teachers', function (Blueprint $table) {
			$table->id('id');
			$table->string('teacher_name');
			$table->string('teacher_email', 100);
			$table->string('teacher_avatar')->default('resources/images/avatar.jpg');
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
			$table->softDeletes();
			$table->index('user_id', 'teachers_user_idx');
			$table->foreign('user_id', 'teachers_user_fk')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('teachers');
	}
};
