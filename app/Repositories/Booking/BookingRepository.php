<?php
namespace App\Repositories\Booking;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingRepository implements BookingRepositoryInterface{
    public function request_booking($request){
        $user = Auth::user();
        return Booking::create([
            "passenger_id" => $user->id,
            "status" => "requested"
        ]);
    }
    
    public function accept_booking($request){
        $booking = Booking::where('id',$request->booking_id)->first();
        $booking->is_accepted = true;
        $booking->is_active = false;
        $booking->status = "accepted";

        return $booking->save();
    }
    
    public function reach_booking($request){
        $booking = Booking::where('id',$request->booking_id)->first();
        $booking->status = 'reached';

        return $booking->save();
    }
    
    public function pick_booking($request){
        $booking = Booking::where('id',$request->booking_id)->first();
        $booking->status = 'picked';

        return $booking->save();
    }
    
    public function drop_booking($request){
        $booking = Booking::where('id',$request->booking_id)->first();
        $booking->status = 'droped';

        return $booking->save();
    }
}
