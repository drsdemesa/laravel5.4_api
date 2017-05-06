<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TagsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		foreach (range(1,10) as $index) {
			App\Tag::create([
				'tag_name' => $faker->word
			]);
		}
    }
}
