<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ForgotPasswordOtpConfirmRequest;
use App\Http\Requests\API\ForgotPasswordRequest;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\OtpCheckRegisterRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Requests\API\UpdateProfileRequest;
use App\Http\Traits\ApiResponse;
use App\Repositories\User\UserRepositoryInterface;

class AuthController extends Controller
{

    use ApiResponse;

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request){
        $results = $this->userRepository->send_register_request($request);

        return $this->success_response(
            $results,
            "Register successfull"
        );
    }

    public function otp_check_register(OtpCheckRegisterRequest $request){
        $results = $this->userRepository->otp_check_register($request);

        if($results['matched']){
            return $this->success_response(
                $results,
                "Phone verified"
            );
        }
        else{
            return $this->error_response(
                $results,
                "OTP not verified"
            );
        }

    }

    public function login(LoginRequest $request){
        $results = $this->userRepository->login($request);

        if($results['token']){
            return $this->success_response(
                $results,
                "Login successful"
            );
        }
        else{
            return $this->error_response(
                $results,
                "Credentials mismatched"
            );
        }

    }

    public function forgot_password(ForgotPasswordRequest $request){
        $results = $this->userRepository->forgot_password($request);

        return $this->success_response(
            $results,
            "OTP Sent"
        );
    }

    public function forgot_password_otp_confirm(ForgotPasswordOtpConfirmRequest $request){
        $results = $this->userRepository->forgot_password_otp_confirm($request);

        if($results){
            return $this->success_response(
                $results,
                "Password Changed"
            );
        }
        else{
            return $this->error_response(
                $results,
                "OTP Not Matched"
            );
        }
    }

    public function update(UpdateProfileRequest $request){
        $results = $this->userRepository->update_profile($request);

        if($results){
            return $this->success_response(
                $results,
                "Profile Updated"
            );
        }
        else{
            return $this->error_response(
                $results,
                "Profile not updated"
            );
        }
    }
}
