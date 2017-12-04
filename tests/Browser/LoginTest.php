<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

//What is the maximum size of characters that a user can send as a password / user name?
//Can we test for that? I have heard sending a very LONG string of characters can crash an application?
//Can Special characters be sent to the server?

class LoginTest extends DuskTestCase
{

    /** 
    *@test 
    */

    public function UserLoginCorrectly()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->assertSee('You are logged in!');

                    //you have to log out to run other tests
            $browser->clickLink('Logout');
        });

    }
    
    /** 
     *   @test 
    */
    public function LoginWithEmptyEmailField()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', '')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->assertPathIs('/login')
                    ->assertSee('Log in')
                    ->assertSee('The email field is required.');

        });

    }
    /** 
      *  @test 
    */
    public function LoginWithEmptyPasswordField()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', '')
                    ->press('Log in')
                    ->assertPathIs('/login')
                    ->assertSee('Log in')
                    ->assertSee('The password field is required.');

        });

    }
    /** 
      *  @test 
    */
    public function LoginWithUnregisteredEmail()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', 'unregistered@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->assertPathIs('/login')
                    ->assertSee('Log in')
                    ->assertSee('These credentials do not match our records.');

        });

    }

    /** 
      *  @test 
    */
    public function LoginWithWrongPassword()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', '123456')
                    ->press('Log in')
                    ->assertPathIs('/login')
                    ->assertSee('Log in')
                    ->assertSee('These credentials do not match our records.');

        });

    }
    /** 
      *  @test 
    */
    public function LoginWhenLoggedin()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/login')
                    ->assertPathIs('/home');//even you requested the login page u will redirected to the home page


        });

    }
}
