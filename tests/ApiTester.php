<?php


namespace Tests;

use Faker\Factory as Faker;

class ApiTester extends TestCase 
{
	protected $faker;

	function __construct($faker)
	{
		$this->faker = Faker::create();
	}
}

