<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LessonTagDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		// $lessonIDs = App\Lesson::list('id'); //[1,2,3,....]
		// $tagIDs = App\Tag::list('tag_id'); //[1,2,3,....]
		$lessonIDs = App\Lesson::all()->pluck('id')->toArray(); //[1,2,3,....]
		$tagIDs = App\Tag::all()->pluck('tag_id')->toArray(); //[1,2,3,....]
		

		foreach (range(1,30) as $index) {
			//a real lesson ID
			// a real tag ID
			DB::table('lesson_tag')->insert([
	            'lesson_id' => $faker->randomElement($lessonIDs),
	            'tag_id' => $faker->randomElement($tagIDs)
       	 	]);
		}
    }
}
