<?php
namespace App\Repositories\Booking;

interface BookingRepositoryInterface{
    public function request_booking($request);
    public function accept_booking($request);
    public function reach_booking($request);
    public function pick_booking($request);
    public function drop_booking($request);
}
