<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function LoginSubmit(Request $request)
    {
        $users = Users::where("email", "=", $request->input('email'))
                ->where("password", "=", md5($request->input('password')." iniadalahsalt"))
                ->first();
        
        if($users === null)
        {
            return response()->json([
                "status"  => 403,
                "success" => "Failed",
                "data"    => null
            ]);
        }
        else
        {
            $request->session()->put("auth", $users);
            return response()->json([
                "status"  => 200,
                "success" => "Success",
                "data"    => $users
            ]);
        }
    }
}
