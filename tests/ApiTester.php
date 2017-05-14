<?php


namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Faker\Factory as Faker;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions; 

class ApiTester extends TestCase 
{
	protected $fake;
	protected $times = 1;
    
    // use DatabaseMigrations;	//drops tables 
	
	function __construct()
	{
		$this->fake = Faker::create();
	}

	public function times($count) {
		$this->times = $count;

		return $this;
	}

	public function setUp(){
		parent::setUp();

		Artisan::call('migrate');
		// $this->app['artisan']->call('migrate'); //another option
	}

    // public function getJson( $uri)
    // {
    //    return json_encode( $this->call('GET', $uri)->getContent() );
    // }
}

