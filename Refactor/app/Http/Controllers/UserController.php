<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function getUsers()
    {
     
        return User::all();

    }
    
    public function getUser($id)
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
    
    public function addUser(Request $request)
    {
        
        $validator = Validator::make($request->only(['first_name','middle_name','last_name','email']),[
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
                $user->contact_number = $request->has('contact_number') ? $request->contact_number : '';
                $user->disabled = false;
                $user->save();
                
                return $user;
    
            }
            catch(Exception $ex)
            {
                // We
            }
        }

        return null;

    }

    public function getUserPets($id)
    {

        $pets = [];

        if($id)
        {
            $pets = User::with(['pets' => function($q) {
                $q->with(['favoriteFoods']);
            }])->get();
        }
         
        return $pets;
        
    }

    public function deleteUserPet($id,$petId)
    {

        Pet::find($petId)->delete();

    }

}
