<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public static function getUsers()
    {
     
        return User::all();

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
    
    public static function addUser(Request $request)
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

                $user = new User();
                $user->first_name = $request->first_name;
                $user->middle_name = $request->middle_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->contact_number = $request->contact_number;
                $user->disabled = false;
                $user->save();
                
                return $user;

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
                $q->with(['favoriteFoods']);
            }])->get();
        }
         
        return $pets;
        
    }

    public static function deleteUserPet($id,$petId)
    {

        Pet::find($petId)->delete();

    }

}
