<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\user;
use Mockery;

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
    public function CreatingUserisCalledProperly()
    {
        $mock=Mockery::mock('App\Http\UserController');
        $mock->shouldReceive('store')->once()->andReturn('stored');
        $testrequest=array('name' =>'ahmed','email'=>'ahmed@app.com' );
        $this->assertEquals('stored',$mock->store($testrequest));
    }

}
