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
    	// DB::table('lessons')->delete();
     //    DB::table('users')->delete();
     //    DB::table('tags')->delete();

        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('lessons')->truncate();
        DB::table('users')->truncate();
        DB::table('tags')->truncate();
        DB::table('lesson_tag')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $this->call(LessonsDatabaseSeeder::class);
        $this->call(UsersDatabaseSeeder::class);
        $this->call(TagsDatabaseSeeder::class);
        $this->call(LessonTagDatabaseSeeder::class);
    }
}
