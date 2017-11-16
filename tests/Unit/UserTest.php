<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Mockery;
use App\Http\Controllers\UserController;

class UserTest extends TestCase
{
        public function tearDown()
        {
            Mockery::close();
        }
	 /**
	 *@test
     */

     public function CheckUserCanbesavedInTheDatabase()
    {
    	//creating a new user


    	$mockedUser=Mockery::mock('App\User');
        $mockedUser->shouldReceive('save')->once()->andReturn('created');

    	$this->assertEquals('created',$mockedUser->save());
    	
    }

    /**
    *@test
     */
    public function indexFunctionTest()
    {
        //dependency Injection
        $mockedUser=Mockery::mock('App\User');
        $mockedRequest=Mockery::mock('Illuminate\Http\Request');
        $mockedUser->shouldReceive('save')->times(0)->andReturn('created');
        $Controller=new UserController($mockedUser);
        $result=$Controller->index(); //index function does not save user
        $this->assertNotNull($result);
    }

}
