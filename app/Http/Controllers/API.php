<?php namespace App\Http\Controllers;

use Auth;
use Authorizer;
use Response;

use DB;



class API extends Controller {

public function __construct()
{
    $this->middleware('oauth');
    $this->middleware('oauth-user');
}

public function start() {
$user_id=Authorizer::getResourceOwnerId(); // the token user_id
$user=\App\User::find($user_id);// get the user data from database


return Response::json($user);
}


public function getlist () {
   $users = DB::table('users')->get();
   return Response::json($users);
}
}