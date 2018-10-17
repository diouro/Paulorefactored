<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AddDummyInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->truncate();
        DB::table('pets')->truncate();
        DB::table('pet_foods')->truncate();

        DB::table('users')->insert([
            'first_name' => 'Paulo',
            'middle_name' => 'Henrique',
            'last_name' => 'Goncalves',
            'email' => 'contact@paulogoncalves.me',
            'password' => 'nothingfornow'
        ]);

        DB::table('pets')->insert([
            [
                'name' => 'dog',
                'user_id' => 1
            ],
            [
                'name' => 'cat',
                'user_id' => 1
            ],
            [
                'name' => 'bird',
                'user_id' => 1
            ]
        ]);

        DB::table('pet_foods')->insert([
            [
                'pet_id' => 1,
                'name' => 'beef'
            ],
            [
                'pet_id' => 1,
                'name' => 'bone'
            ],
            [
                'pet_id' => 2,
                'name' => 'fish'
            ],
            [
                'pet_id' => 2,
                'name' => 'milk'
            ],
            [
                'pet_id' => 3,
                'name' => 'seeds'
            ],
            [
                'pet_id' => 3,
                'name' => 'insects'
            ],
        ]);
    }
}
