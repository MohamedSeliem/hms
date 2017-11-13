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
		->assertSee("subscriber@app.com")		//a user
		->assertSee("storeMeplease@app.com");   // anothr user


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

    /**
     * @test
     */
    public function StoreNewUserTest(){
        //Login as an admin to create user
        $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

        //create post request with json contain info of the new user.
        $response=$this->call('POST','/manage/users', ['name'=>'storeMe','email' => 'newuser@app.com','password'=>'password']);

        //if the user created successfully you will get redirected to a page that shows the user you created with its number.
        //ToDo obtain the user ID automatically
        $user = User::where('email', 'newuser@app.com')->first();
        $response->assertStatus(302)
        ->assertRedirect("/manage/users/{$user->id}");
    }
        /**
     * @test
     */
    public function doNotStoreNewUser_ifduplicate(){
        //Login as an admin to create user
        $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

        //create post request with json contain info of the new user.
        $response=$this->call('POST','/manage/users', ['name'=>'storeMe','email' => 'storeMeplease@app.com','password'=>'password']);

        //if the user not created you will home page.
  

        $response->assertStatus(302)
        ->assertRedirect("/");
    }

    /**
     * @test
     */
    public function updateUserTest_ifexist(){
        //Login as an admin to update user
        $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

        //select user you want to update
        $user = User::where('email', 'newuser@app.com')->first();


        if($user->id != null)
        {
            $response=$this->call('PUT','/manage/users/{$user->id}', ['email' => 'updateuser@app.com','password'=>'password'],$user->id);
            printf($user->id);
            $response->assertStatus(302)
            ->assertRedirect("/manage/users/{$user->id}");
        }
        else{
            asserTrue(false);
        }
        
    }
}

