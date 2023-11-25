<?php
namespace App\Repositories\RideRequest;

use App\Models\RideRequest;
use Illuminate\Support\Facades\Auth;

class RideRequestRepository implements RideRequestRepositoryInterface{

    public function create_new_ride_request($request){
        $request['vehicle_type_id'] = 1;
        $request['currency'] = "PKR";
        $request['user_id'] = Auth::user()->id;
        return RideRequest::create($request->all()); 
    }

    public function get_ride_requests(){
        return RideRequest::all();
    }
    
    public function get_ride_my_requests(){
        return RideRequest::where('id',Auth::user()->id)->get();
    }

    public function get_ride_request_by_id($id){
        return RideRequest::where('id',$id)->first()->toArray();
    }

    public function update_ride_request($request,$id){
        return RideRequest::where('id',$id)->update($request->except("_token"));
    }

    public function destroy_ride_request($id){
        return RideRequest::where('id',$id)->delete();
    }

}
