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
        $this->times(5)->makeLesson();

        //act 
        $this->getJson('api/v1/lessons');

        //assert
        // $response->assertResponseOk();
        // $response->assertStatus(200);
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
