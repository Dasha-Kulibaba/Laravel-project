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
		Schema::create('grammars', function (Blueprint $table) {
			$table->id('id');
			$table->string('gr_topic');
			$table->unsignedBigInteger('group_id');
			$table->timestamps();

			$table->index('group_id', 'grammars_groups_idx');
			$table->foreign('group_id', 'grammars_groups_fk')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('grammars');
	}
};
