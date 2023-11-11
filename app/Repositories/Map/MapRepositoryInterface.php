<?php
namespace App\Repositories\Map;

interface  MapRepositoryInterface{
    public function get_home($request);
    public function search($request);
}
