<?php

namespace Tests\Feature;

use Tests\ApiTester;
use \App\Lesson;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LessonsTest extends ApiTester
{
    /** @test */
    public function it_fetches_lessons(){
        //arrange
        $this->makeLesson();

        //act 
        $response = $this->get('api/v1/lessons');
        //assert
        $response->assertStatus(200);
        $response->assertJsonFragment(array( 'body'));  //some_bool is present but wasn't able to be detected
        $response->assertJsonFragment(array( 'title'));  //some_bool is present but wasn't able to be detected
        $response->assertJsonFragment(array( 'some_bool'));  //some_bool is present but wasn't able to be detected
        $this->assertTrue(true);
        
    }

    private function makeLesson($lessonFields = []){
        $lesson = array_merge(
            [
                'title' => $this->fake->sentence,
                'is_displayed' => $this->fake->boolean,
                'body' => $this->fake->paragraph,
            ],
            $lessonFields  //for overriding in case some fields were passed
        );

        while($this->times--) Lesson::create($lesson);
    }



}
