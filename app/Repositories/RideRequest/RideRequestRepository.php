<?php
namespace App\Repositories\RideRequest;

use App\Models\RideRequest;

class RideRequestRepository implements RideRequestRepositoryInterface{

    public function create_new_ride_request($request){
        $request['user_id'] = 1;
        $request['vehicle_type_id'] = 1;
        $request['vehicle_type_id'] = 1;
        $request['currency'] = "PKR";
        return RideRequest::create($request->all()); 
    }

    public function get_ride_requests(){
        return RideRequest::all();
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
