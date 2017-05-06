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
    	DB::table('lessons')->delete();
        DB::table('users')->delete();
        DB::table('tags')->delete();
        DB::table('lesson_tag')->truncate();
        
        $this->call(LessonsDatabaseSeeder::class);
        $this->call(UsersDatabaseSeeder::class);
        $this->call(TagsDatabaseSeeder::class);
        $this->call(LessonTagDatabaseSeeder::class);
    }
}
