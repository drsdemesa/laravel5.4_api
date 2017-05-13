<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class InvoiceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
	public function run()
	{
		$faker = Faker::create();

		foreach (range(1,5) as $index) {
			$item_amt = $faker->randomNumber(3,true);
			$received_amt = $item_amt - $faker->randomDigit;
			$received_amt = (($received_amt) > 0 )? $received_amt : $item_amt;
			$outstanding_amt = $item_amt - $received_amt;

			DB::table('invoices')->insert([
	            'item' => $faker->word,
	            'item_no' => $faker->randomDigit,
	            'created_at' => Carbon\Carbon::now(),
	            'updated_at' => Carbon\Carbon::now(),
	            'item_amt' => $item_amt,
	            'received_amt' => $received_amt,
	            'outstanding_bal' => $outstanding_amt
       	 	]);
		}
	}
}
