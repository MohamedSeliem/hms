<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Mockery;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

    /**
    *@test
     */
    public function storeFunctionTest()
    {
        //dependency Injection
        $mockedUser=Mockery::mock('App\User');
        $mockedRequest=Mockery::mock('Illuminate\Http\Request');
        $mockedUser->shouldReceive('save')->once()->andReturn('created');
        $Controller=new UserController($mockedUser);

        $Request=new Request(['name'=>'storeMe','email' => 'newuser@app.com','password'=>'password']);//create new user request

        $result=$Controller->store($request); //store function will call save function to store the user at least one time.
        $this->assertNotNull($result);
    }

    /**
    *@test
     */
    public function storeFunctionTestWith_N_users()
    {
        $n=10; //number of users to be stored
        //dependency Injection
        $mockedUser=Mockery::mock('App\User');
        $mockedRequest=Mockery::mock('Illuminate\Http\Request');
        $mockedUser->shouldReceive('save')->times($n)->andReturn('user created');
        $Controller=new UserController($mockedUser);

        $users=factory('App\User',$n)->create();//create N users

        foreach ($users as $user){
            $Request=new Request(['name'=>$user->name,'email' => $user->email,'password'=>$user->password]);
            $result=$Controller->store($request); //store function will call save function to store each user.
            $this->assertNotNull($result);//every time make sure that user is stored by  checking the result
        }

    }

}
