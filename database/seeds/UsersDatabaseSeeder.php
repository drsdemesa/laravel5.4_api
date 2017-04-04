<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersDatabaseSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1,5) as $index) {
			DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
	            'created_at' => Carbon\Carbon::now(),
	            'updated_at' => Carbon\Carbon::now()
       	 	]);
		}
	}
}