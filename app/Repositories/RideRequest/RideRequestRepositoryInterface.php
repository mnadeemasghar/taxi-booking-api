<?php
namespace App\Repositories\RideRequest;

interface RideRequestRepositoryInterface{
    public function create_new_ride_request($request);
    public function get_ride_requests();
    public function get_ride_request_by_id($id);
    public function update_ride_request($request,$id);
    public function destroy_ride_request($id);
}
