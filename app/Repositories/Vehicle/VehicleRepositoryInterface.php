<?php
namespace App\Repositories\Vehicle;

interface VehicleRepositoryInterface{ 
    public function create_update_vehicle($request); 
    public function get_vehicle(); 
}
