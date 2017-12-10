<?php

use App\Recipe;
use GuzzleHttp\Client;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */
class CorsTest extends Laravel\Lumen\Testing\TestCase
{
    /** @test */
    public function cors_are_open_by_default()
    {
        $recipe = factory(Recipe::class)->make()->toArray();

        /** @var Client $guzzle */
        $guzzle = app()->make(Client::class);

        $uri = 'http://api.test/recipe/';

        $request = $guzzle->request('POST', $uri, ['json' => $recipe]);

        $actualResponse = json_decode($request->getBody()->getContents(), true);

        $expectedResponse = ['success' => [
            'message' => 'Request processed successfully.',
            'status_code' => 200
        ]];

        $this->assertEquals($expectedResponse, $actualResponse);
    }

    public function createApplication()
    {
        // Use local environment instead.
    }
}