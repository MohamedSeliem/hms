<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ControllerTest extends TestCase
{
use Tests\ControllersTestHelper;
    public $controller;
    public $response;
    public function setUp()
    {
        $this->controller = new ControllerStub;
        $this->response = Mockery::mock('Illuminate\Foundation\Testing\Client');
    }
    public function tearDown()
    {
        Mockery::close();
    }
    public function testAssertViewIs()
    {
        View::shouldReceive('make')
            ->once()
            ->with('user');
        $this->response->shouldReceive('getOriginalContent')
            ->once()
            ->andReturn(Mockery::mock([
                'getName' => 'patient'
            ]));
        $this->controller->show();
        $this->assertViewis('user');
    }
}
class ControllerStub {
    public function show()
    {
        return View::make('user');
    }
}
