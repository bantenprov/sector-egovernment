<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectorEgovernmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('sector_egovernments', function(Blueprint $table) {
			$table->increments('id');
			$table->string('label');
			$table->string('description')->nullable();
			$table->integer('user_id');
			$table->string('link');
			$table->timestamps();
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
		Schema::drop('sector_egovernments');
	}
}
