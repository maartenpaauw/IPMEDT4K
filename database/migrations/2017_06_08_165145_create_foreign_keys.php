<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('patients', function(Blueprint $table) {
			$table->foreign('triage_id')->references('id')->on('triages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('patients', function(Blueprint $table) {
			$table->foreign('status_id')->references('id')->on('statuses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('triages_comparison', function(Blueprint $table) {
			$table->foreign('triage_a_id')->references('id')->on('triages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('triages_comparison', function(Blueprint $table) {
			$table->foreign('triage_b_id')->references('id')->on('triages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_triage_id_foreign');
		});
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_status_id_foreign');
		});
		Schema::table('triages_comparison', function(Blueprint $table) {
			$table->dropForeign('triages_comparison_triage_a_id_foreign');
		});
		Schema::table('triages_comparison', function(Blueprint $table) {
			$table->dropForeign('triages_comparison_triage_b_id_foreign');
		});
	}
}