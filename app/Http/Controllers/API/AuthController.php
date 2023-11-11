<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
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

    public function login(LoginRequest $request){
        $results = $this->userRepository->login_user($request);

        return $this->success_response(
            $results,
            "Login successfull"
        );
    }

    public function register(RegisterRequest $request){
        $results = $this->userRepository->register_new_user($request);

        return $this->success_response(
            $results,
            "Register successfull"
        );
    }
}
