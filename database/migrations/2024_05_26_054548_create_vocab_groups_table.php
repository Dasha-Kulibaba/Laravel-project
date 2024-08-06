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
		Schema::create('vocab_groups', function (Blueprint $table) {
			$table->id('id');
			$table->unsignedBigInteger('group_id');
			$table->unsignedBigInteger('voc_id');

			$table->timestamps();

			$table->index('group_id', 'vocab_groups_group_idx');
			$table->index('voc_id', 'vocab_groups_voc_idx');

			$table->foreign('group_id', 'vocab_groups_group_fk')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');

			$table->foreign('voc_id', 'vocab_groups_voc_fk')->references('id')->on('vocabularies')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('vocab_groups');
	}
};
