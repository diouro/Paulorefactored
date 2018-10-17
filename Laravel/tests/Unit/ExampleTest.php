<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\UserController;

class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        
        $controller = new UserController();
        
        $users = $controller->getUsers();

        $this->assertGreaterThan(0,$users->count());

    }
}
