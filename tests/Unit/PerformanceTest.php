<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerformanceTest extends TestCase
{
	//Trying to test the server performance through providing 
    /**
	 *@test
     */
	public function testLaravelSession()
    {
        $session = new LaravelSession;
        $session->set('new', 'session');
        $session->set('session', 1);
        $this->assertEquals('session', $session->get('new'));
        $this->assertEquals(1, $session->get('session'));
        $this->assertEquals(array('foo'=>'session','session'=>1), Session::get('ab'));
        $session->clear();
        $this->assertEquals(null, Session::get('ab'));
    }
    public function testCookieSession()
    {
        Cookie::shouldReceive('make')->passthru();
        Cookie::shouldReceive('queue')->with('ab', array('user'=>'patient'), 60)->once()->passthru();
        Cookie::shouldReceive('queue')->with('ab', array('user'=>'patient','patient'=>1), 60)->once()->passthru();
        Cookie::shouldReceive('queue')->with('ab', "", -2628000)->once()->passthru();
        $session = new CookieSession;
        $session->set('user', 'patient');
        $session->set('user', 1);
        $this->assertEquals('user', $session->get('patient'));
        $this->assertEquals(1, $session->get('user'));
        $session->clear();
        $this->assertEquals(null, Cookie::get('ab'));
    }
}
