<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\APIBaseController as APIBaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class LoginController extends APIBaseController
{
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            return $this->sendResponse($user, 'User login succesfully.');
        }else{
            return $this->sendError('Login fail!.');
        }
    }
}
