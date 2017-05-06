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
        DB::table('tags')->truncate();
        DB::table('lesson_tag')->truncate();

        $this->call(LessonsDatabaseSeeder::class);
        $this->call(UsersDatabaseSeeder::class);
        $this->call(TagsDatabaseSeeder::class);
        $this->call(LessonTagDatabaseSeeder::class);
    }
}
