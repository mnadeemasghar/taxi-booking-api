<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\VehicleUpdateRequest;
use App\Http\Traits\ApiResponse;
use App\Repositories\Vehicle\VehicleRepositoryInterface;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    use ApiResponse;

    private $vehicleRepository;
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_vehicle = $this->vehicleRepository->get_vehicle();        
        return $this->success_response(
            $user_vehicle,
            "User Vehicle"
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleUpdateRequest $request)
    {
        $user_vehicle = $this->vehicleRepository->create_update_vehicle($request);
        
        if($user_vehicle){
            return $this->success_response(
                $user_vehicle,
                "Vehicle Updated"
            );
        }
        else{
            return $this->success_response(
                "",
                "Something went wrong"
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
