<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class pageTransitionTest extends TestCase
{
    
    /**
	 *@test
     */
     //check transition to log in page through get
    public function TestLoginPage()
    {
    	   $res= $this->get('/login');
         $res->assertPathIs('/login');
         $res->assertPathIsNot('/logout');
         $res->assertSee("Log In");
         $res->assertSee("Email address");
         $res->assertDontSee("We care about your Health.");
         $res->assertSee("Remember me");
         $res->assertStatus(200);
    }
    //check transition to Home page through get
    public function TestHome()
    {
    	   $res= $this->get('/');
         $res->assertStatus(200);
         $res->assertSee("Health Monitoring System");
         $res->assertSee("We care about your Health.");
         $res->assertDontSee("Remember me");
         $res->assertDontSee("Log In");
    }
    //check transition to logout page through Post method
    public function TestLoginPageWithPost()
    {
         $res= $this->call('POST','/login', ['email' => 'patient@app.com','password'=>'password']);
         $res->assertStatus(302);
         $res->assertSee("Redirecting to http://localhost/home");
         $res->assertDontSee("Remember me");
         $res->assertDontSee("Log In");
    }
    
        public function PostLogoutPage(){
    	   $res = $this->call('POST','/logout');
         $res->assertStatus(302);
         $res->assertSee("Redirecting to http://localhost");
         $res->assertSee("Health Monitoring System");
        
    }
    
    
    
}
