<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\HomeController;

class myfirstTest extends TestCase
{
    /**
     * @test
     */

    public function testExample()
    {
    	$hController=new HomeController();
    	
        $this->assertTrue(true);
    }
}
