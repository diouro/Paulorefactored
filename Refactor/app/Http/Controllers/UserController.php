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
        foreach ($users as $user) {
            unset($user->password);
        }
        
        return $users;
        
    }
    
    public static function getUsersById()
    {
        $user = null;
        $users = DB::table('users')->where('id', $id)->get();
        if (count($users) > 0) {
            $user = $users[0];
        }
     
        return $user;
    }
    
    public static function addUser()
    {
     
        
    }



}
