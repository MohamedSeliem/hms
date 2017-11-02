<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
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
                    ->pause(1000)
                    ->assertPathIs('/register')
                    ->assertSee('Register')
                    ->assertSee('The email has already been taken.');
        });
    }
}
