<?php
namespace App\Repositories\Vehicle;

use App\Models\Stop;
use App\Models\UserVehicle;
use Illuminate\Support\Facades\Auth;

class VehicleRepository implements VehicleRepositoryInterface{
    public function create_update_vehicle($request){
        $user = Auth::user();
        $vehicle = UserVehicle::where('user_id',$user->id)->first();

        if($vehicle){
            $vehicle->delete();
        }

        $new_vehilcle = UserVehicle::create([
            'vehicle_type_id' => $request->vehicle_type_id,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'seats' => $request->seats,
            'license_plate' => $request->license_plate,
            'driver_license' => $request->driver_license,
            'user_id' => $user->id,

        ]);

        if($new_vehilcle){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_vehicle(){
        $user = Auth::user();
        $vehicle = UserVehicle::where('user_id',$user->id)->first();
        return $vehicle;
    }
}
