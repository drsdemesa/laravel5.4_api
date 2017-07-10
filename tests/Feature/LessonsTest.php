<?php

namespace Tests\Feature;

use Tests\ApiTester;
use \App\Lesson;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LessonsTest extends ApiTester
{
    public function it_fetches_lessons(){
        //arrange - arrange variables
        $this->makeLesson();

        //act -put things in motion
        $response = $this->get('api/v1/lessons');

        //assert
        $response->assertStatus(200);
        $response->assertJsonFragment(array( 'data'));  //some_bool is present but wasn't able to be detected
        $response->assertJsonFragment(array( 'body'));  //some_bool is present but wasn't able to be detected
        $response->assertJsonFragment(array( 'title'));  //some_bool is present but wasn't able to be detected
        $response->assertJsonFragment(array( 'some_bool'));  //some_bool is present but wasn't able to be detected
        $this->assertTrue(true);
        
    }

    /** @test */
    public function it_fetches_a_single_lesson(){
        $this->makeLesson();

        $response2 = $this->get('api/v1/lessons/1');

        $response2->assertJsonFragment(array( 'data'));  //some_bool is present but wasn't able to be detected
        $response2->assertJsonFragment(array( 'body'));  //some_bool is present but wasn't able to be detected
        $response2->assertJsonFragment(array( 'title'));  //some_bool is present but wasn't able to be detected
        $response2->assertJsonFragment(array( 'some_bool'));  //some_bool is present but wasn't able to be 
        $this->assertObjectHasAttributes($response2, 'body', 'title', 'some_bool');
        $this->assertTrue(true);
    }

    private function assertObjectHasAttributes(){
        $args = func_get_args();
        $object = array_shift($args);

        foreach($args as $attribute){
            $this->assertObjectHasAttribute($attribute, $object->getData());
        }
        dd($args);
    }

    protected function getStub (){
        return [
                'title' => $this->fake->sentence,
                'is_displayed' => $this->fake->boolean,
                'body' => $this->fake->paragraph,
            ]
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
