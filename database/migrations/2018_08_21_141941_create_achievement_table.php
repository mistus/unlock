<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('achievement')->
		create('achievements', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('account_id');
			$table->integer('achievement_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('achievement')
			->drop('achievements');
	}
}
