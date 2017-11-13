<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\user;

class UserTest extends TestCase
{
	 /**
	 *@test
     */

     public function CheckUserCreatedInTheDatabase()
    {
    	//creating a new user
    	$user=new User(array('name' => 'patient','email'=>'patient@app.com','password'=>'password'));
    	$this->be($user);


    	//patient Id is 3
    	$this->assertEquals('3',$user->getAuthIdentifierName());
    	
    	//patient password is password

		$this->assertEquals('password',$user->getAuthPassword());
   		
   		//patient tocken tkb5A3OzKsNrS3EZg02RJ7ejVcTPQ6uupsEOZdOZNxWsr7z3QyJa1997q05D 
		$this->assertEquals('tkb5A3OzKsNrS3EZg02RJ7ejVcTPQ6uupsEOZdOZNxWsr7z3QyJa1997q05D',$user->getRememberToken());
    }

}

/*
	public function tearDown(){
		Mockery::close();
	}
    /**
	 *@test
    
    public function testExample()
    {
        $mock=Mockery::mock('App\User');
        $mock->shouldReceive('posts')->once()->andReturn('mocked');


        $this->assertEquals('mocked',$mock->posts());
    }
    */