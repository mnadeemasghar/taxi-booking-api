<?php
namespace App\Repositories\Stop;

interface StopRepositoryInterface{
    public function create_stop($request);   
    public function get_stops_by_user();   
    public function update_stops_by_user($request);   
    public function delete_stops_by_user($request);   
}
