<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */



	public function up()
	{
		Schema::create('vocabularies', function (Blueprint $table) {
			$table->id('id');
			$table->string('voc_word');
			$table->string('voc_explain');
			$table->string('voc_example');
			$table->timestamps();
			$table->softDeletes();
		});

		// DB::unprepared('
		//       CREATE TRIGGER before_insert_voc_word
		//       BEFORE INSERT ON vocabularies
		//       FOR EACH ROW
		//       SET NEW.voc_word = CONCAT(UCASE(SUBSTRING(NEW.voc_word, 1, 1)), LCASE(SUBSTRING(NEW.voc_word, 2)));
		//   ');

		// DB::unprepared('
		//       CREATE TRIGGER before_update_voc_word
		//       BEFORE UPDATE ON vocabularies
		//       FOR EACH ROW
		//       SET NEW.voc_word = CONCAT(UCASE(SUBSTRING(NEW.voc_word, 1, 1)), LCASE(SUBSTRING(NEW.voc_word, 2)));
		//   ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// DB::unprepared('DROP TRIGGER IF EXISTS before_insert_voc_word');
		// DB::unprepared('DROP TRIGGER IF EXISTS before_update_voc_word');
		Schema::dropIfExists('vocabularies');
	}
};
