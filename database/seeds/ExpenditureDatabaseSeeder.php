<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
			$item_amt = $faker->randomNumber(3, true);

			DB::table('expenditures')->insert([
	            'exp_item' => $faker->word,
                'exp_amt' => $item_amt,
	            'updated_at' => Carbon\Carbon::now(),
	            'spent_by' => $faker->name,
       	 	]);
		}
    }
}
