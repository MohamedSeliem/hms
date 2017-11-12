<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class HomeControllerTest extends TestCase
{
/**
     * @test
     */
    public function redirects_to_login_if_not_authenticated()
    {        
    	$response =$this->call('GET', 'home');
		$response->assertStatus(302);//302 redirect
		$response->assertRedirect('/login');
        
    }

    /**
     * @test
     */
    public function returns_home_page_if_authenticated()
    {
    	$this->call('POST','/login', ['email' => 'administrator@app.com','password'=>'password']);
		$response = $this->call('GET', 'home');
        $response->assertStatus(200);//200 success

    }

}
