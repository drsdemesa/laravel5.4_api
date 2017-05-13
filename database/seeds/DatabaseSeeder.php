<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $tables = [
        'lessons', 
        'tags', 
        'users', 
        'lesson_tag',
        'invoices',
        'expenditures'
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->cleanDatabase();

        $this->call(LessonsDatabaseSeeder::class);
        $this->call(UsersDatabaseSeeder::class);
        $this->call(TagsDatabaseSeeder::class);
        $this->call(LessonTagDatabaseSeeder::class);
        $this->call(InvoiceDatabaseSeeder::class);
    }

    private function cleanDatabase(){
        // DB::table('lessons')->delete();
         //    DB::table('users')->delete();
         //    DB::table('tags')->delete();

        // DB::table('lessons')->truncate();
        // DB::table('users')->truncate();
        // DB::table('tags')->truncate();
        // DB::table('lesson_tag')->truncate();

        DB::statement("SET FOREIGN_KEY_CHECKS=0");

        foreach($this->tables as $tableName){
            DB::table($tableName)->truncate();
        }
        
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }
}
