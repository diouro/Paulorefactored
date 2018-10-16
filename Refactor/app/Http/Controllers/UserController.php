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
     
        $users = Users::all();
        foreach ($users as $user) 
        {
            unset($user->password);
        }
        
        return $users;
        
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
     
        if ($request->has('password')) {
            unset($request['password']);
        }
     
        if ($request->has('username')) {
            unset($request['username']);
        }
     
        if ($request->has('api_token')) {
            unset($request['api_token']);
        }
     
        $request->validate([
            'first_name' => 'required|max:64',
            'middle_name' => 'max:64',
            'last_name' => 'required|max:64',
            'email' => 'required|unique:users|max:256',
        ]);
     
        DB::table('users')->insert([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'disabled' => false,
        ]);
     
        $users = DB::table('users')->where('email', $email)->get();
     
        if (count($users) > 0) {
            $user = $users[0];
            $user->login_date_formatted = $user->login_date->format('Y-m-d H:i:s'); 
            $user->create_date_formatted = $user->created_at->format('Y-m-d H:i:s'); 
            $user->update_date_formatted = $user->updated_at->format('Y-m-d H:i:s'); 
            return $user;
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


}
