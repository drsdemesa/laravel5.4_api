<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LessonsDatabaseSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach (range(1,10) as $index) {
			// Lesson::create([
			// 	'title' => $faker->sentence(5),
			// 	'body' => $faker->paragraph(4)
			// ]);
			DB::table('lessons')->insert([
	            'title' => $faker->sentence(5),
	            'body' => $faker->paragraph(4),
	            'created_at' => Carbon\Carbon::now(),
	            'updated_at' => Carbon\Carbon::now()
       	 	]);
		}
	}
}