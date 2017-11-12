<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     *@test
     */
    public function RegisterWithanAlreadyRegisteredEmail()
    {
        $this->browse(function (Browser $browser) {
                    $browser->visit('/')
                    ->clickLink('Register')
                    ->assertSee('Register')
                    ->value('#name','Mohamed')
                    ->value('#email','seliem3@app.com')
                    ->value('#password','123456')
                    ->value('#password_confirmation','123456')
                    ->press('Register')
                    ->assertPathIs('/register')
                    ->assertSee('Register')
                    ->assertSee('The email has already been taken.');
        });
    }

    /**
     *@test
     */
    public function RegisterWithanEmptyField()
    {
        $this->browse(function (Browser $browser) {
                    $browser->visit('/')
                    ->clickLink('Register')
                    ->assertSee('Register')
                    ->value('#name','')
                    ->value('#email','noname@app.com')
                    ->value('#password','noname')
                    ->value('#password_confirmation','noname')
                    ->press('Register')
                    ->assertPathIs('/register')
                    ->assertSee('Register');
        });
    }

    
    /**
     *@test
     */
    public function RegisterWithUnvalidEmail()
    {
        $this->browse(function (Browser $browser) {
                    $browser->visit('/')
                    ->clickLink('Register')
                    ->assertSee('Register')
                    ->value('#name','unvalid')
                    ->value('#email','unvaliedemail')//valid email  something@something.something
                    ->value('#password','unvalid')
                    ->value('#password_confirmation','unvalid')
                    ->press('Register')
                    ->assertPathIs('/register')
                    ->assertSee('Register')
                    ->assertSee('The email must be a valid email address.');
        });
    }

    /**
     *@test
     */
    public function RegisterWithUnvalidPassword()
    {
        $this->browse(function (Browser $browser) {
                    $browser->visit('/')
                    ->clickLink('Register')
                    ->assertSee('Register')
                    ->value('#name','unvalid')
                    ->value('#email','unvaliedpassword@app.com')
                    ->value('#password','123') //valid password at leaset six characters 
                    ->value('#password_confirmation','123')
                    ->press('Register')
                    ->assertPathIs('/register')
                    ->assertSee('Register')
                    ->assertSee('The password must be at least 6 characters.');
        });
    }

     /**
     *@test
     */
    public function RegisterWithUnmatchedPasswodConfirmation()
    {
        $this->browse(function (Browser $browser) {
                    $browser->visit('/')
                    ->clickLink('Register')
                    ->assertSee('Register')
                    ->value('#name','different Pass')
                    ->value('#email','different Pass@app.com')
                    ->value('#password','password') 
                    ->value('#password_confirmation','wordpass')
                    ->press('Register')
                    ->assertPathIs('/register')
                    ->assertSee('Register')
                    ->assertSee('The password confirmation does not match.');
        });
    }   

}
