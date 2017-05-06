<?php

use Illuminate\Database\Seeder;

class LessonTagDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		foreach (range(1,30) as $index) {
			//a real lesson ID
			// a real tag ID
		}
    }
}
