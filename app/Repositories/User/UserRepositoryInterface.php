<?php
namespace App\Repositories\User;

interface UserRepositoryInterface{
    public function send_register_request($request);
    public function otp_check_register($request);
    public function login($request);
    public function forgot_password($request);
    public function forgot_password_otp_confirm($request);
    public function update_profile($request);
}
