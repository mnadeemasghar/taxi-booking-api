<?php
namespace App\Repositories\Map;

use App\Models\RideRequest;
use Carbon\Carbon;

class MapRepository implements MapRepositoryInterface{

    public function get_home($request)
    {
        $topLeftLat = $request->top_left_lat;
        $topLeftLng = $request->top_left_lng;
        $bottomRightLat = $request->bottom_right_lat;
        $bottomRightLng = $request->bottom_right_lng;
        $datetime = Carbon::parse($request->datetime);

        // grace time
        $graceMinutes = $request->gracetime;

        $minimumDateTime = $datetime->copy()->subMinutes($graceMinutes);
        $maximumDateTime = $datetime->copy()->addMinutes($graceMinutes);


        $rides = RideRequest::where(function ($query) use (
            $topLeftLat, $bottomRightLat,
            $topLeftLng, $bottomRightLng,
            $minimumDateTime, $maximumDateTime
        ) {
            $query->whereBetween('pick_datetime', [$minimumDateTime, $maximumDateTime])
                  ->where(function ($query) use ($topLeftLat, $bottomRightLat, $topLeftLng, $bottomRightLng) {
                      $query->whereBetween('pick_lat', [$topLeftLat, $bottomRightLat])
                            ->whereBetween('pick_lng', [$topLeftLng, $bottomRightLng]);
                  })
                  ->orWhere(function ($query) use ($topLeftLat, $bottomRightLat, $topLeftLng, $bottomRightLng) {
                      $query->whereBetween('drop_lat', [$topLeftLat, $bottomRightLat])
                            ->whereBetween('drop_lng', [$topLeftLng, $bottomRightLng]);
                  })
                  ->orWhereBetween('drop_datetime', [$minimumDateTime, $maximumDateTime]);
        })->get();


        return $rides;
    }

    // public function search($request){

    //     $ride_requests = new RideRequest();

    //     $grace_pick_area = 0.00;
    //     $grace_drop_area = 0.00;

    //     $grace_pick_minutes = 0;
    //     $grace_drop_minutes = 0;

    //     if(isset($request->grace_pick_area)){
    //         $grace_pick_area = $request->grace_pick_area;
    //     }

    //     if(isset($request->grace_drop_area)){
    //         $grace_drop_area = $request->grace_drop_area;
    //     }
        
    //     if(isset($request->pick_lat) && isset($request->pick_lng)){
    //         $minimum_pick_lat = $request->pick_lat - $grace_pick_area;
    //         $maximum_pick_lat = $request->pick_lat + $grace_pick_area;

    //         $minimum_pick_lng = $request->pick_lng - $grace_pick_area;
    //         $maximum_pick_lng = $request->pick_lng + $grace_pick_area;

    //         $ride_requests = $ride_requests->whereBetween('pick_lat',[$minimum_pick_lat, $maximum_pick_lat])
    //                                         ->whereBetween('pick_lng',[$minimum_pick_lng, $maximum_pick_lng]);
    //     }

    //     if(isset($request->drop_lat) && isset($request->drop_lng)){
    //         $minimum_drop_lat = $request->drop_lat - $grace_drop_area;
    //         $maximum_drop_lat = $request->drop_lat + $grace_drop_area;

    //         $minimum_drop_lng = $request->drop_lng - $grace_drop_area;
    //         $maximum_drop_lng = $request->drop_lng + $grace_drop_area;

    //         $ride_requests = $ride_requests->whereBetween('drop_lat',[$minimum_drop_lat, $maximum_drop_lat])
    //                                         ->whereBetween('drop_lng',[$minimum_drop_lng, $maximum_drop_lng]);
    //     }

    //     if(isset($request->vehicle_type_ids)){
    //         $ride_requests = $ride_requests->whereIn('vehicle_type_id',explode(',',$request->vehicle_type_ids));
    //     }
        
    //     if(isset($request->type)){
    //         $ride_requests = $ride_requests->where('type',$request->type);
    //     }

    //     if(isset($request->grace_pick_minutes)){
    //         $grace_pick_minutes = $request->grace_pick_minutes;
    //     }
        
    //     if(isset($request->pick_datetime)){
    //         $pick_datetime = Carbon::parse($request->pick_datetime);
    //         $minimum_pick_datetime = $pick_datetime->copy()->subMinutes($grace_pick_minutes);
    //         $maximum_pick_datetime = $pick_datetime->copy()->addMinutes($grace_pick_minutes);

    //         $ride_requests = $ride_requests->whereBetween('pick_datetime',[$minimum_pick_datetime, $maximum_pick_datetime]);
    //     }

    //     if(isset($request->grace_drop_minutes)){
    //         $grace_drop_minutes = $request->grace_drop_minutes;
    //     }
        
    //     if(isset($request->drop_datetime)){
    //         $drop_datetime = Carbon::parse($request->drop_datetime);
    //         $minimum_drop_datetime = $drop_datetime->copy()->subMinutes($grace_drop_minutes);
    //         $maximum_drop_datetime = $drop_datetime->copy()->addMinutes($grace_drop_minutes);

    //         $ride_requests = $ride_requests->whereBetween('drop_datetime',[$minimum_drop_datetime, $maximum_drop_datetime]);
    //     }


    //     return $ride_requests->get();
    // }

    public function search($request){
        $ride_requests = new RideRequest();
        
        $grace_pick_area = 0.1;

        $ride_requests = $ride_requests->whereBetween('pick_lat',[$request->lat - $grace_pick_area, $request->lat + $grace_pick_area]);
        $ride_requests = $ride_requests->whereBetween('pick_lng',[$request->lng - $grace_pick_area, $request->lng + $grace_pick_area]);
        
        $rideRequestsData = $ride_requests->get();

        return $rideRequestsData;
    }
}
