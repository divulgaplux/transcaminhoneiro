<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Http\Resources\UserComplete as UserResource;

class AuthController extends Controller
{
    public function login (Request $request) {
        // dd($request);
        $validatedData = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $login = $request->all();

        if( Auth::attempt([
                'email' => $login['email'],
                'password' => $login['password'],
                'is_actived' => true
            ],
            isset( $login['remember'] )
        )) {
            return response()->json([
                'success' => true,
                'user' => new UserResource( Auth::user() )
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Not correct'
            ], 200);
        }
    }

    public function register (Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);

        $register = $request->all();

        $user = new User();
        $user->name = $register['name'];
        $user->email = $register['email'];
        $user->password = bcrypt( $register['password'] );
        $user->save();

        return new UserResource( $user );
    }

    
}
