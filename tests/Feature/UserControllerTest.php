<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserControllerTest extends TestCase
{
	/**
     * @test
     */
    public function ShowMeUsers_IfPermitted()
    {   
        $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

    	$response =$this->call('GET', '/manage/users');
		$response->assertStatus(200)
		->assertViewIs("manage.users.index")
		->assertSee("mohamed@app.com")		//a user
		->assertSee("subscriber@app.com");   // anothr user


        $this->call('POST','/logout');
    }

    /**
     * @test
     */
    public function redirectMe_doNotShowMeUsers_IfnotPermitted()
    {   
        $this->call('POST','/login', ['email' => 'subscriber@app.com','password'=>'password']);

    	$response =$this->call('GET', '/manage/users');
		$response->assertStatus(302)
		->assertRedirect("/login")    // not allowed u need to re login
		->assertSee("Redirecting to"); // i will show you the home page as u logged in with limited permissions

		$this->call('POST','/logout');
        
    }

     /**
     * @test
     */
    public function returnCreateUserViewIfPermitted()
    {   
        $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

    	$response =$this->call('GET', '/manage/users/create');
		$response->assertStatus(200)
		->assertViewIs("manage.users.create")    
		->assertSee("Create New User"); 

		$this->call('POST','/logout');
        
    }

     /**
     * @test
     */
    public function showMeCertainUserIfPermitted()
    {   
        $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

        //$id=1 superadmi,2	Administrator, 3	Patient, 4	Doctor
    	$response =$this->call('GET', '/manage/users/1');
		$response->assertStatus(200)
		->assertViewIs("manage.users.show")    
		->assertSee("Superadministrator"); 

        $response =$this->call('GET', '/manage/users/2');
		$response->assertStatus(200)
		->assertViewIs("manage.users.show")    
		->assertSee("Administrator");

		$response =$this->call('GET', '/manage/users/3');
		$response->assertStatus(200)
		->assertViewIs("manage.users.show")    
		->assertSee("Patient"); 


		$response =$this->call('GET', '/manage/users/4');
		$response->assertStatus(200)
		->assertViewIs("manage.users.show")    
		->assertSee("Doctor");  


		$this->call('POST','/logout');
        
    }

	/**
     * @test
     */
    public function checkThatpaginatWorks(){

    	$this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

        //require a certain page by passing page number in GET Request

    	$response =$this->call('GET', '/manage/users?page=1');
		$response->assertStatus(200)
		->assertViewIs("manage.users.index"); 
    }

}

