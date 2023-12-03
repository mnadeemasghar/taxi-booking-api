<?php
namespace App\Repositories\User;

use App\Models\ForgotOTP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface{

    public function username_check($request)
    {
        return [
            "user" => "found"
        ];
    }
    
    public function send_register_request($request)
    {
        $otp_expire = 1;
        $haspassword = Hash::make($request->password);

        $data = $request->except('password');
        $data['password'] = $haspassword;
        $data['expire_at'] = Carbon::now()->addHours($otp_expire);
        $data['otp'] = rand(100000, 999999);
        $user = User::create($data);

        return [
            "otp_expire_at" => $otp_expire." hour(s)"
        ];
    }
    
    public function otp_check_register($request)
    {
        // check otp, phone and expire_at

        $user = User::where('phone',$request->phone)
                        ->where('otp',$request->otp)
                        ->where('phone_verified_at',null)
                        ->whereDate('expire_at','<=',Carbon::now())
                        ->first();
        if($user){
            $user->phone_verified_at = Carbon::now();
            $user->save();

            return [
                "matched" => true
            ];
        }
        else{
            return [
                'matched' => false
            ];
        }
    }
    
    public function login($request)
    {
        if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){ 
            $user = User::where('phone',$request->phone)->first();
            $token = $user->createToken("Laravel App Token")->accessToken;
            return [
                "token" => $token
            ];
        }
        else{
            return [
                'token' => false
            ];
        }
    }
    
    public function forgot_password($request)
    {
        $user = User::where('phone',$request->phone)->first();
        $expire_after = 1;

        if($user){ 
            $otp = ForgotOTP::create([
                'otp' => rand(100000, 999999),
                'expire_at' => Carbon::now()->addHours($expire_after),
                'user_id' => $user->id
            ]);
        }

        return [
            "OTP sent"
        ];
    }
    
    public function forgot_password_otp_confirm($request)
    {
        $user = User::where('phone',$request->phone)->first();
        $otp = ForgotOTP::where('user_id',$user->id)
                            ->where('otp',$request->otp)
                            ->whereDate('expire_at',"<=", Carbon::now())
                            ->where('is_used',false)
                            ->first();
        if($otp){
            $otp->is_used = true;
            $otp->save();

            $user->password = Hash::make($request->new_password);
            $user->save();
            
            return true;
        }
        else{
            return false;
        }
    }
    
    public function update_profile($request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        
        $update_user = $user->update([
            'name' => $request->name ?? $user->name
        ]);
        
        if($update_user){
            return true;
        }
        else{
            return false;
        }
    }

}
