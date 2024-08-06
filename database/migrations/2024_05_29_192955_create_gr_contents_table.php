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
		Schema::create('gr_contents', function (Blueprint $table) {
			$table->id();
			$table->text('gt_content');
			$table->string('gt_type', 15);
			$table->unsignedBigInteger('gr_id');
			$table->timestamps();

			$table->index('gr_id', 'gr_contents_grammar_idx');
			$table->foreign('gr_id', 'gr_contents_grammar_fk')->references('id')->on('grammars')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::dropIfExists('gr_contents');
	}
};
