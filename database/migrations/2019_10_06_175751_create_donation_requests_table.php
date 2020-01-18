<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->string('notes');
			$table->integer('age');
			$table->integer('bags_number');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->decimal('latitude',10,8);
			$table->decimal('longitude',10,8);
			$table->integer('city_id')->unsigned()->nullable();
			$table->integer('blood_type_id')->unsigned()->nullable();
			$table->integer('client_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}