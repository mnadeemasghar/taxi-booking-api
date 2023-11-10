<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Repositories\User\UserRepositoryInterface;

class AuthController extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request){
        return $this->userRepository->login_user($request);
    }

    public function register(RegisterRequest $request){
        return $this->userRepository->register_new_user($request);
    }
}
