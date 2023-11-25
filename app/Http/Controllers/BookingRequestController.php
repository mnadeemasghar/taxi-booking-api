<?php

namespace App\Http\Controllers;

use App\Repositories\Map\MapRepository;
use App\Repositories\RideRequest\RideRequestRepository;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class BookingRequestController extends Controller
{

    public $rideRequestRepository;
    public $mapRepository;

    public function __construct(
        RideRequestRepository $rideRequestRepository,
        MapRepository $mapRepository
        )
    {
        $this->rideRequestRepository = $rideRequestRepository;
        $this->mapRepository = $mapRepository;
    }

    public function home(){
        $ride_requests = $this->rideRequestRepository->get_ride_requests();
        if($ride_requests->count() > 0){
            return view('welcome')->with('data',$ride_requests);
        }
        else{
            return view('booking_request.create');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ride_requests = $this->rideRequestRepository->get_ride_requests();
        if($ride_requests->count() > 0){
            return view('booking_request.index')->with('data',$ride_requests);
        }
        else{
            return view('booking_request.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('booking_request.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rideRequest = $this->rideRequestRepository->create_new_ride_request($request);
        return redirect()->route('BookingRequest.index');
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
        $ride_request = $this->rideRequestRepository->get_ride_request_by_id($id);
        return view('booking_request.create')->with($ride_request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rideRequest = $this->rideRequestRepository->update_ride_request($request,$id);
        return redirect()->route('BookingRequest.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rideRequest = $this->rideRequestRepository->destroy_ride_request($id);
        return redirect()->route('BookingRequest.index');
    }

    /**
     * view search form
     */
    public function search()
    {
        return view('booking_request.search');
    }

    /**
     * view search form result
     */
    public function search_result(Request $request)
    {
        $search_result = $this->mapRepository->search($request);

        if($search_result->count() > 0){
            return view('booking_request.index')->with('data',$search_result);
        }
        else{
            return view('booking_request.create')->with(["pick_lat" => $request->lat, "pick_lng" => $request->lng]);
        }
    }

}
