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
		Schema::create('lessons', function (Blueprint $table) {
			$table->id('id');
			$table->string('les_topic');
			$table->date('les_date');
			$table->unsignedBigInteger('group_id')->nullable();
			$table->timestamps();

			$table->index('group_id', 'les_groups_idx');
			$table->foreign('group_id', 'les_groups_fk')->on('groups')->references('id');
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
		Schema::dropIfExists('lessons');
	}
};
