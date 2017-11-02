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
    public function redirects_to_home_if_not_permitted()
    {    
    	$user = new User(array('name' => 'patient','email'=>'patient@app.com','password'=>'password'));
   		$this->be($user);   

        $response =$this->call('GET', '/home');
		$response->assertStatus(200);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(302);
        
    }

    /**
     * @test
     */
    public function returns_manage_page_if_permitted()
    {
    	$user = new User(array('name' => 'superadministrator','email'=>'superadministrator@app.com','password'=>'password'));
        $this->be($user);

        $response =$this->call('GET', '/home');
		$response->assertStatus(200);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(200);
	}
        
}
