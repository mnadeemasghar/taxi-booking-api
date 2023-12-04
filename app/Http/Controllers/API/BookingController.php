<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookingAcceptRequest;
use App\Http\Requests\API\BookingDropRequest;
use App\Http\Requests\API\BookingPickRequest;
use App\Http\Requests\API\BookingReachRequest;
use App\Http\Requests\API\BookingRequestRequest;
use App\Http\Traits\ApiResponse;
use App\Repositories\Booking\BookingRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    use ApiResponse;
    
    private $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function create(BookingRequestRequest $request)
    {
        $booking = $this->bookingRepository->request_booking($request);

        if($booking){
            return $this->success_response(
                $booking,
                "Booking Requested"
            );
        }
        else{
            return $this->success_response(
                "",
                "Something went wrong"
            );
        }
    }
    public function accept(BookingAcceptRequest $request)
    {
        $booking = $this->bookingRepository->accept_booking($request);

        if($booking){
            return $this->success_response(
                $booking,
                "Booking Accepted"
            );
        }
        else{
            return $this->success_response(
                "",
                "Something went wrong"
            );
        }
    }
    public function reach(BookingReachRequest $request)
    {
        $booking = $this->bookingRepository->reach_booking($request);

        if($booking){
            return $this->success_response(
                $booking,
                "Booking Reached"
            );
        }
        else{
            return $this->success_response(
                "",
                "Something went wrong"
            );
        }
    }
    public function pick(BookingPickRequest $request)
    {
        $booking = $this->bookingRepository->pick_booking($request);

        if($booking){
            return $this->success_response(
                $booking,
                "Booking Picked"
            );
        }
        else{
            return $this->success_response(
                "",
                "Something went wrong"
            );
        }
    }
    public function drop(BookingDropRequest $request)
    {
        $booking = $this->bookingRepository->drop_booking($request);

        if($booking){
            return $this->success_response(
                $booking,
                "Booking Droped"
            );
        }
        else{
            return $this->success_response(
                "",
                "Something went wrong"
            );
        }
    }
}
