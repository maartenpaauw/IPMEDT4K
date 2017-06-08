<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTriagesComparisonTable extends Migration {

	public function up()
	{
		Schema::create('triages_comparison', function(Blueprint $table) {
			$table->increments('id')->unique();
			$table->integer('triage_a_id')->unsigned();
			$table->integer('triage_b_id')->unsigned();
			$table->text('description')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('triages_comparison');
	}
}