<?php
namespace App\Repositories\Map;

use App\Http\Traits\ApiResponse;
use App\Models\RideRequest;
use Carbon\Carbon;

class MapRepository implements MapRepositoryInterface{
    use ApiResponse;

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


        if($rides->count() > 0){
            return $this->success_response(['rides'=>$rides],'Rides are available in your area');
        }
        else{
            return $this->error_response(['rides'=>$rides],'No ride found in your area, create your ride and take benefit');
        }
    }
}
