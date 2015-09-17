<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DummyEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('employees')->insert(
			array(
				'first_name'=>'Nadimul',
				'last_name'=>'haque',
				'email'=>'nadimsajib@hotmail.com',
				'photo'=>'images/employees/11-09-15-User.png',
				'updated_at'=>'2015-09-17',
				'created_at'=>'2015-09-17'
			)
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('employees')->where('email','=','nadimsajib@hotmail.com')->delete();
	}

}
