<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StopDestroyRequest;
use App\Http\Requests\API\StopStoreRequest;
use App\Http\Requests\API\StopUpdateRequest;
use App\Http\Traits\ApiResponse;
use App\Repositories\Stop\StopRepositoryInterface;
use Illuminate\Http\Request;

class StopController extends Controller
{
    use ApiResponse;

    private $stopRepository;

    public function __construct(StopRepositoryInterface $stopRepository)
    {
        $this->stopRepository = $stopRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stops = $this->stopRepository->get_stops_by_user();

        return $this->success_response(
            $stops,
            "Stops List"
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
    public function store(StopStoreRequest $request)
    {
        $stop = $this->stopRepository->create_stop($request);

        if($stop){
            return $this->success_response(
                "",
                "Stop Created"
            );
        }
        else{
            return $this->error_response(
                "",
                "Something went wrong"
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StopUpdateRequest $request )
    {
        $stops = $this->stopRepository->update_stops_by_user($request);

        if($stops){
            return $this->success_response(
                $stops,
                "Stop Updated"
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
    public function destroy(StopDestroyRequest $request)
    {
        $stops = $this->stopRepository->delete_stops_by_user($request);

        if($stops){
            return $this->success_response(
                $stops,
                "Stop Deleted"
            );
        }
        else{
            return $this->success_response(
                "",
                "Something went wrong"
            );
        }
    }
}
