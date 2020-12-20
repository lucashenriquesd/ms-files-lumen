<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->get('/');

        // $response = $this->withHeaders([
        //     'app-token' => env('APP_TOKEN'),
        // ])->json('GET', '/');

        $this->json('GET', '/', [null], ['app-token' => env('APP_TOKEN')]);

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
}
