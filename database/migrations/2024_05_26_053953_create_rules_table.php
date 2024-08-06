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
		Schema::create('rules', function (Blueprint $table) {
			$table->id('id');
			$table->string('rule_text', 500);
			$table->string('rule_example', 500);
			$table->unsignedBigInteger('gr_id')->nullable();
			$table->timestamps();

			$table->index('gr_id', 'rule_gr_idx');
			$table->foreign('gr_id', 'rule_gr_fk')->references('id')->on('grammars')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('rules');
	}
};
