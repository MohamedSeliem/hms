<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
/** @test */

    public function user_login()

    {


        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->assertSee('Dashboard')
                    ->assertSee('You are logged in!');

        });

    }
}
