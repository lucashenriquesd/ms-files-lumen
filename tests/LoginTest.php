<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserStore()
    {
        $response = $this->json('POST', '/users', ['name' => '', 'login' => '', 'api_token' => ''], ['app-token' => env('APP_TOKEN'), 'api-token' => '123']);

        $this->assertEquals(
            '{"id":1,"name":"Lucas","login":"lucas","created_at":"2020-12-05T04:38:02.000000Z","updated_at":"2020-12-05T20:49:21.000000Z"}',
            $this->response->getContent()
        );
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSucessUserLogin()
    {
        $response = $this->json('POST', '/users/login', [null], ['app-token' => env('APP_TOKEN'), 'api-token' => '123']);

        $this->assertEquals(
            '{"id":1,"name":"Lucas","login":"lucas","created_at":"2020-12-05T04:38:02.000000Z","updated_at":"2020-12-05T20:49:21.000000Z"}',
            $this->response->getContent()
        );
    }
}
