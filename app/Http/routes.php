<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('/register',function(){$user = new App\User();
 $user->name="test1 user";
 $user->email="test1@test.com";
 $user->password = \Illuminate\Support\Facades\Hash::make("password");
 $user->save();
 
});


Route::get('/api',['before' => 'oauth', 'uses' => 'API@start']); 

Route::get('/getlist',['before' => 'oauth', 'uses' => 'API@getlist']); 
Route::get('/getdetail',['before' => 'oauth', 'uses' => 'API@getlist']); 