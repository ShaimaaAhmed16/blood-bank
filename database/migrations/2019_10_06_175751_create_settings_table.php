<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('notification_settings_text');
			$table->string('phone');
			$table->text('about_app');
			$table->string('email');
			$table->string('fb_link');
			$table->string('tw_link');
			$table->string('insta_link');
			$table->string('goog_link');
			$table->string('you_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}