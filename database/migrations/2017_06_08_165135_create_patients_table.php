<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id')->unique();
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('patient_number')->unique();
			$table->integer('band_number')->unique();
			$table->integer('triage_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->timestamp('checked_in_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('treated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));;
			$table->timestamp('checked_out_at')->default(\DB::raw('CURRENT_TIMESTAMP'));;
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}