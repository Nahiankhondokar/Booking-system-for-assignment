<?php

namespace Tests\Unit\App\Services;

use App\Services\HelloService;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class TestServiceTest extends TestCase
{
    public function test_create_slug()
    {
        // arrange
        $service = new HelloService();

        // act
        $response = $service->create_slug('We are living in Bangladesh:Hello world');

        // assert
        $this->assertEquals('we-are-living-in-bangladeshhello-world', $response);
    }
}
