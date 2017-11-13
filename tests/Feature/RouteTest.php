<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


//This test case is used to test the server routes settings

class RouteTest extends TestCase
{
    

    /**
	 *@test
     */

    public function GetHomePage()
    {
    	 $response = $this->get('/');
         $response->assertStatus(200);
         $response->assertSee("Health Monitoring System");
         $response->assertSee("We care about your Health.");

    }
	/**
	 *@test
     */
    public function GetLoginPage(){
    	$response = $this->get('/login');
         $response->assertStatus(200);
         $response->assertSee("Log In");
         $response->assertSee("Email address");
         $response->assertSee("Remember me");
    }

    /**
	 *@test
     */
    public function PostLoginPage(){

    	 $response = $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);
         $response->assertStatus(302);
         $response->assertSee("Redirecting to http://localhost/home");
    }

    /**
	 *@test
     */
    public function PostLogoutPage(){

    	 $response = $this->call('POST','/logout');
         $response->assertStatus(302);
         $response->assertSee("Redirecting to http://localhost");
    }

     /**
	 *@test
     */
    public function GetManageDashboard(){
    	//login then get Manage
    	 $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

    	 $response = $this->get('/manage/dashboard');
         $response->assertStatus(200);
         $response->assertSee("/manage/users");
         $response->assertSee("/manage/roles");
         $response->assertSee("/manage/permissions");
    }

     /**
	 *@test
     */
    public function GetManageUsers(){
    	//login then get Manage
    	 $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

    	 $response = $this->get('/manage/users');
         $response->assertStatus(200);
         $response->assertSee("Create New User");
         $response->assertSee("Edit");
         $response->assertSee("View");
    }
/**
	 *@test
     */
    public function GetManageRoles(){
    	//login then get Manage
    	 $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

    	 $response = $this->get('/manage/roles');
         $response->assertStatus(200);
         $response->assertSee("Create New Role");
         $response->assertSee("Edit");

    }
    /**
	 *@test
     */
    public function GetManagePermissions(){
    	//login then get Manage
    	 $this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);

    	 $response = $this->get('/manage/permissions');
         $response->assertStatus(200);
         $response->assertSee("Create New Permission");
         $response->assertSee("Edit");
    }
    /**
	 *@test
     */
    public function GetRegisterPage(){
    	 $response = $this->get('/register');
         $response->assertStatus(200);
         $response->assertSee("Name");
         $response->assertSee("Email address");
         $response->assertSee("Password");
         $response->assertSee("Confirm Password");
    }
    /*
	 *@test
     *
    public function PostRegisterPage(){
        

    	 $response = $this->call('POST','/register', ['name'=>'newname','email' => 'newemail@app.com','password'=>'password','password_confirmation'=>'password']);
         $response->assertStatus(302);
         $response->assertSee("Redirecting to http://localhost/home");
    }*/
}
