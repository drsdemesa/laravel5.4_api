<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('lessons')->truncate();
        DB::table('users')->truncate();

        $this->call(LessonsDatabaseSeeder::class);
        $this->call(UsersDatabaseSeeder::class);
    }
}
