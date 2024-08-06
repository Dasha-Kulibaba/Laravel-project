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
		Schema::create('students', function (Blueprint $table) {
			$table->id('id');
			$table->string('st_name');
			$table->string('st_email', 100);
			$table->string('st_avatar')->default('resources/images/avatar.jpg');
			$table->unsignedBigInteger('group_id');
			$table->unsignedBigInteger('user_id');
			$table->timestamps();

			$table->index('group_id', 'st_group_idx');
			$table->index('user_id', 'students_user_idx');
			$table->foreign('group_id', 'st_group_fk')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('user_id', 'students_user_fk')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('students');
	}
};
