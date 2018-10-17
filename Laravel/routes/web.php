<?php 

Route::group(['prefix' => '/v1'], function () {

    Route::group(['prefix' => '/users'], function () {

        //User 
        Route::get('/', 'UserController@getUsers');
        Route::get('/{id}', 'UserController@getUser');
        Route::post('/', 'UserController@addUser');

        // User pets
        Route::get('/{id}/pets', 'UserController@getUserPets');
        Route::delete('/{id}/pets/{petId}', 'UserController@deleteUserPet');

    });

});