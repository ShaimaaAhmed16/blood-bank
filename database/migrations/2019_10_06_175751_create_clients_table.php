<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('phone');
			$table->string('password');
			$table->string('email');
			$table->date('date_birth');
			$table->string('pin_code');
            $table->boolean('is_active');
			$table->date('last_donation_date');
            $table->string('api_token',60)->unique()->nullable();
			$table->integer('blood_type_id')->unsigned()->nullable();
			$table->integer('city_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}