<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
class AuthController extends Controller
{
    //
    public function Login(LoginRequest $request): Application | Response | \Illuminate\Contracts\Foundation\Application | ResponseFactory
    {

        $credentials=$request->validated();

        if (!Auth::attempt($credentials)){
            return response([
                'message'=>'Provided email or password is incorrect',
            ],422);
        }
        /** @var User $user */
        $user=Auth::user();
        $token=$user->createToken('main')->plainTextToken;
        return response(compact('user','token'));

    }
    public function Signup(SignupRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
       $data=$request->validated();
       /** @var User $user */
//        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
        $user = User::create($data);
        $token=$user->createToken('main')->plainTextToken;

        return response(compact('user','token'));

    }
    public function Logout(Request $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        /** @var User $user */
        $user=$request->user();
        $user->currentAccessToken()->delete();
        return response('',204);
    }
}
