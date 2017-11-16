<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Role;
use App\Permission;
class ManageTest extends DuskTestCase
{
    /**
     *@test
     */

    public function ShowMeUsers_Ifpermitted()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/users')
                    ->assertSee('id')->assertSee('Name')->assertSee('Email')->assertSee('Date Created');
                
                 $browser->clickLink('Logout');
        });
    }

    /**
     *@test
     */

    public function CreateUserFromWebInterface()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/users/create')
                    ->assertSee('Roles')->assertSee('Name')->assertSee('Email')
                    ->type('email', 'NewUser3@app.com')
                    ->type('name', 'Newuser')
                    ->press('Create New User');
                //after creating the user check that the user exists
             $user=User::where('email', 'NewUser3@app.com')->first();
             $path='/manage/users/'.$user->id;
            $browser->assertPathIs($path)
                    ->clickLink('Logout');
        });
    }


public function Can_not_CreateUserFromWebInterface_withEmptyFields()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/users/create')
                    ->assertSee('Roles')->assertSee('Name')->assertSee('Email')
                    ->type('email', '')
                    ->type('name', 'Newuser')
                    ->press('Create New User');
                //check that user is not created and u still in the same page
              $browser->assertPathIs('/manage/users/create')
                    ->assertSee('Roles')->assertSee('Name')->assertSee('Email')
                    ->clickLink('Logout');
        });
    }

    /**
     *@test
     */

    public function ShowMeRoles_Ifpermitted()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/roles')
                    ->assertSee('Manage Roles')->assertSee('Details')->assertSee('Edit');
                
                 $browser->clickLink('Logout');
        });
    }

    /**
     *@test
     */

    public function CreateRoleFromWebInterface()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/roles/create')
                    ->assertSee('Create New Role')->assertSee('Role Details:')->assertSee('Permissions:')
                    ->type('name', 'NewRole')
                    ->type('email', 'NewUser3@app.com')
                    ->press('Create new Role');
                //after creating the user check that the user exists
             $role=Role::where('name', 'NewRole')->first();
             $path='/manage/users/'.$role->id;
            $browser->assertPathIs($path)
                    ->clickLink('Logout');
        });
    }


public function Can_not_CreateRoleFromWebInterface_withEmptyFields()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/roles/create')
                    ->assertSee('Create New Role')->assertSee('Role Details:')->assertSee('Permissions:')
                    ->type('name', '')
                    ->press('Create new Role');
                //check that user is not created and u still in the same page
              $browser->assertPathIs('/manage/roles/create')
                    ->assertSee('Create New Role')->assertSee('Role Details:')->assertSee('Permissions:')
                    ->clickLink('Logout');
        });
    }

    /**
     *@test
     */

    public function ShowMePermissions_Ifpermitted()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/permissions')
                    ->assertSee('Slug')->assertSee('Name')->assertSee('Description')->assertSee('Manage Permissions');
                
                 $browser->clickLink('Logout');
        });
    }

    /**
     *@test
     */

    public function CreatePermissionFromWebInterface()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/permissions/create')
                    ->assertSee('Roles')->assertSee('Name')->assertSee('Email')
                    ->type('name', 'NewPermission')
                    ->press('Create New User');
                //after creating the user check that the user exists
             $permission=Permission::where('name', 'NewPermission')->first();
             $path='/manage/users/'.$permission->id;
            $browser->assertPathIs($path)
                    ->clickLink('Logout');
        });
    }


public function Can_not_CreatePermissionFromWebInterface_withEmptyFields()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                    ->assertSee('Log in')
                    ->type('email', 'administrator@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/permissions/create')
                    ->assertSee('Create New Permission')->assertSee('Basic Permission')->assertSee('CRUD Permission')
                    ->type('name', 'NewPermission')
                    ->press('Create Permission');
                //check that user is not created and u still in the same page
              $browser->assertPathIs('/manage/users/create')
                    ->assertSee('Create New Permission')->assertSee('Basic Permission')->assertSee('CRUD Permission')
                    ->clickLink('Logout');
        });
    }


    /**
     *@test
     */
    public function redirect_Ifnotpermitted()
    {
        $this->browse(function (Browser $browser) {
             $browser
                    ->visit('/')
                    ->clickLink('Login')
                    ->assertSee('Log in')
                    ->type('email', 'patient@app.com')
                    ->type('password', 'password')
                    ->press('Log in')
                    ->visit('/manage/roles')  //try to access the user roles
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->visit('/manage/permissions') //try to access the user permissions
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard')
                    ->visit('/manage/users') //try to access the user's list
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard');
        });
    }
}
 