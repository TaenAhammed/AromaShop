<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    private $successCode = 200;
    private $failCode = 401;

    public function createtoken(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], $this->failCode);
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $result = [];
        $result['token'] = $user->createToken('aromashop')->accessToken;
        $result['name'] = $user->name;

        return response()->json(['result' => $result], $this->successCode);
    }

    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();
            $result = [];
            $result['token'] = $user->createToken('aromashop')->accessToken;
            return response()->json(['result'=> $result], $this->successCode);
        }
        else
        {
            return response()->json(['error'=> 'Login failed'], $this->failCode);
        }
    }
}
