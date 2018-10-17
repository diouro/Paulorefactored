<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class ExampleTest extends TestCase
{

    private $uController;

    public function setUp()
    {
        parent::setUp();
        $this->uController = new UserController;

        // Make sure it call this db:seeder before begin the test
        // Not ideal but at least wont fail for non data
        \Artisan::call('db:seed' , [
            '--class' => 'AddDummyInfo'
        ]);

    }

    public function testFetchUsers()
    {
        // dd($this->uController);
        $users = $this->uController->getUsers();
        $this->assertGreaterThan(0,$users->count());
    }

    public function testFetchSingleUser()
    {
        $user = $this->uController->getUser(1);
        $this->assertInstanceOf('App\User',$user);
    }

    public function testFetchUserPets()
    {
        $user = $this->uController->getUserPets(1);
        $this->assertGreaterThan(0,$user->first()->pets->count());
    }

    public function testDeleteUserPet()
    {
        $pet = \App\Pet::first();
        if($pet)
        {
            $this->assertNull($this->uController->deleteUserPet($pet->user_id,$pet->id));
        }
        else
        {
            // No more pets to delete
            $this->assetTrue(false);
        }

    }

    public function testAddUser()
    {
        
        $user = $this->uController->addUser(new Request([
            'first_name' => 'F Name',
            'middle_name' => 'M Name',
            'last_name' => 'L name',
            'email' => rand(100,1000) . '@test.com'
        ]));

        $this->assertInstanceOf('App\User',$user);
    }

}
