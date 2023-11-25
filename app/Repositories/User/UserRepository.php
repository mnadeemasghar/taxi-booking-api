<?php
namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface{

    public function username_check($request)
    {
        return [
            "user" => "found"
        ];
    }
    
    public function register_new_user($request)
    {
        $haspassword = Hash::make($request->password);

        $data = $request->except('password');
        $data['password'] = $haspassword;

        $user = User::create($data);

        $token = $user->createToken("Laravel App Token")->accessToken;

        return [
            "user" => $user,
            "token" =>$token
        ];
    }

    public function login_user($request)
    {
        $attempt = Auth::attempt(['username' => $request->username, 'password' => $request->password]);

        if($attempt){
            $user = User::where('username',$request->username)->first();
            $token = $user->createToken("Laravel App Token")->accessToken;

            return [
                "user" => $user,
                "token" =>$token
            ];
        }


    }
}
