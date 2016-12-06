<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LessonsTest extends ApiTester
{

    use Factory;

    /** @test */
    public function it_fetches_lessons()
    {
        
        // arrange
        $this->times(5)->make('Lesson');

        //act
        $this->getJson('api/v1/lessons');

        //assert
        $this->assertResponseOk();


    }

    /** @test */
    public function it_fetches_a_single_lesson()
    {
        $this->make('Lesson');

        $lesson = json_decode($this->getJson('api/v1/lessons/1')->response->content());

        $this->assertResponseOk();
        $this->assertObjectHasAttributes($lesson->data, 'body', 'title', 'active');

    }

    /** @test */
    public function it_404s_if_a_lesson_is_not_found()
    {
        $this->getJson('api/v1/lessons/x');
        $this->assertResponseStatus(404);
    }

    /** @test */
    public function it_creates_a_new_lesson_given_valid_parameters()
    {
        $this->call('POST', 'api/v1/lessons', $this->getStub());
        $this->assertResponseStatus(201);
    }

    /** @test */
    public function it_throws_a_422_if_a_new_lesson_request_fails_validation()
    {
        $this->call('POST', 'api/v1/lessons', []);
        $this->assertResponseStatus(422);
    }

    protected function getStub()
    {
        return [
            'title' => $this->fake->sentence,
            'body' => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean
        ];
    }

}
