<?php

namespace Tests\Feature;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

class LessonsTest extends ApiTester
{
    /** @test */
    public function it_fetches_lessons(){
        //arrange
        $this->makeLesson();

        //act 
        $this->getJson('api/v1/lessons');

        //assert
        $this->assertResponseOk();
    }

    private function makeLesson($lessonFields = []){
        $lesson = array_merge(
            [
                'title' => '',
                'some_bool' => '',
                'body' => ''
            ]
        );
    }
}
