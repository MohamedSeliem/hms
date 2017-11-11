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
     //false email
    public function when_fails_go_to_home()
    {    
    	$usr = new User(array('name' => 'patient','email'=>'superadministrator@app.com','password'=>'password'));
   		$this->be($usr);   
        $response =$this->call('GET', '/home');
		$response->assertStatus(200);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(302);
        
    }
    
         //false password
    public function when_fails_go_to_home2()
    {    
    	$usr = new User(array('name' => 'patient','email'=>'patient@app.com','password'=>'pass'));
   		$this->be($usr);   
        $response =$this->call('GET', '/home');
		$response->assertStatus(200);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(302);
        
    }
    
             //false user role
    public function when_fails_go_to_home2()
    {    
    	$usr = new User(array('name' => 'doctor','email'=>'patient@app.com','password'=>'password'));
   		$this->be($usr);   
        $response =$this->call('GET', '/home');
		$response->assertStatus(200);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(302);
        
    }
    
    //false user role for superadmin
    
        public function when_fails_go_to_home2()
    {    
    	$usr = new User(array('name' => 'doctor','email'=>'superadministrator@app.com','password'=>'password'));
   		$this->be($usr);   
        $response =$this->call('GET', '/home');
		$response->assertStatus(200);
		$response =$this->call('GET', 'manage');
		$response->assertStatus(302);
        
    }
    
    
    
}
