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
                    ->value('#name','Mohamed Seliem')
                    ->value('#email','seliem@app.com')
                    ->value('#password','123456')
                    ->value('#password_confirmation','123456')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/register');
        });
    }
}
