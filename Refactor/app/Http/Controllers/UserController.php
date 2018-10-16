<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserControllers extends Controller
{

    public static function getUsers()
    {
     
        return Users::all();

    }
    
    public static function getUsersById($id)
    {
        
        if($id)
        {            
            $user = User::find($id);
            if ($user) {
                return $user;
            }
        }

        return null;
    }
    
    public static function addUser()
    {
        
        $validator = $request->validate([
            'first_name'    => 'required|max:64',
            'middle_name'   => 'max:64',
            'last_name'     => 'required|max:64',
            'email'         => 'required|unique:users|max:256',
        ]);
        
        if(!$validator->fails())
        {

            try
            {

                $userId = DB::table('users')->insertGetId([
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'contact_number' => $request->contact_number,
                    'disabled' => false,
                ]);

                return User::find($userId);

            }
            catch(Exception $ex)
            {
                // We would log this to a bug tracker
            }

        }
     
        return null;

    }

    public static function getUserPets($id)
    {

        $pets = [];

        if($id)
        {
            $pets = User::with(['pet' => function($q) {
                $q->with(['petfoods']);
            }])->get();
        }
         
        return $pets;
        
    }

    public static function deleteUserPet($id,$petId)
    {

        Pet::find($petId)->delete();

    }


}
