<?php

use Illuminate\Database\Seeder;

class ExpenditureDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

		foreach (range(1,3) as $index) {
			$item_amt = $faker->randomNumber;

			DB::table('expenditure')->insert([
	            'exp_item' => $faker->word,
	            'updated_at' => Carbon\Carbon::now(),
	            'spent_by' => $faker->name,
       	 	]);
		}
    }
}
