<?php
namespace App\Http\Traits;

trait ApiResponse{
    public function error_response($data,$message){
        return response()->json([
            "status" => false,
            "message" => $message,
            "data" => $data,
            "error" => true
            ]);
    }

    public function success_response($data,$message){
        return response()->json([
            "status" => true,
            "message" => $message,
            "data" => $data,
            "error" => false
            ]);
    }
}
