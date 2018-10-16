<?php 

// API version v1
Route::group(['prefix' => '/v1', 'middleware' => 'auth'], function () {

    Route::group(['prefix' => '/users'], function () {

        //User 
        Route::get('/', 'UserController@getUsers');
        Route::get('/{id}', 'UserController@getUser');
        Route::post('/users', 'UserController@addUser');

        // User pets
        Route::get('/{id}/pets', 'UserController@getUserPets');
        
    });
    
     
     
     
    Route::delete('/users/{id}/pets/{id}', function($userId, $petId) {
        DB::table('pets')->where('id', $petId)->delete();
        return null;
    });

});

 

