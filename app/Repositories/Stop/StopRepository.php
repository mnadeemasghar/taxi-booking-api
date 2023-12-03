<?php
namespace App\Repositories\Stop;

use App\Models\Stop;
use Illuminate\Support\Facades\Auth;

class StopRepository implements StopRepositoryInterface{
    public function create_stop($request){
        $user = Auth::user();

        $new_stop = Stop::create([
            'lat' => $request->lat,
            'lng' => $request->lng,
            'price' => $request->price,
            'date_time' => $request->date_time,
            'stop_number' => $request->stop_number,
            'user_id' => $user->id
        ]);
        
        if($new_stop){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_stops_by_user($request){
        $user = Auth::user();
        $stop = Stop::where('user_id',$user->id)->first();
        
        if($stop){
            $new_stop = $stop->update([
                'lat' => $request->lat ?? $stop->lat,
                'lng' => $request->lng ?? $stop->lng,
                'price' => $request->price ?? $stop->price,
                'date_time' => $request->date_time ?? $stop->date_time,
                'stop_number' => $request->stop_number ?? $stop->stop_number
            ]);
        }

        
        if($new_stop){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_stops_by_user($request){
        $user = Auth::user();
        $stop = Stop::where('user_id',$user->id)->where('id',$request->id)->first();
        
        if($stop){
            $new_stop = $stop->delete();
        }
        else{
            $new_stop = false;
        }

        
        if($new_stop){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_stops_by_user(){
        $user = Auth::user();

        $stops = Stop::where('user_id',$user->id)->orderBy('stop_number','ASC')->get();

        return $stops;
    }
}
