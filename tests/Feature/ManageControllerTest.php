<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Http\ManageController;
use App\Permission;

class ManageControllerTest extends TestCase
{
	/**
     * @test
     */
    public function redirects_to_login_if_not_permitted()
    {    
   
        $this->call('POST','/login', ['email'=>'patient@app.com','password'=>'password']);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(302)
        ->assertRedirect('/login'); // as you do not have the credential to manage
        
        $this->call('POST','/logout');//logout to end up your session
    }

    /**
     * @test
     */
    public function redirects_to_manage_page_if_permitted()
    {
        $this->call('POST','/login', ['email'=>'superadministrator@app.com','password'=>'password']);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(302)
        ->assertRedirect('/manage/dashboard');

        $this->call('POST','/logout');//logout to end up your session
	}   

}
