<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatussesTable extends Migration {

	public function up()
	{
		Schema::create('statuses', function(Blueprint $table) {
			$table->increments('id')->unique();
			$table->string('name')->unique();
			$table->string('slug')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('statuses');
	}
}