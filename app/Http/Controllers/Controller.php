<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\HomeRequest;
use App\Http\Requests\API\SearchRequest;
use App\Http\Traits\ApiResponse;
use App\Repositories\Map\MapRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    use ApiResponse;

    private $mapRepository;

    public function __construct(MapRepositoryInterface $mapRepository)
    {
        $this->mapRepository = $mapRepository;
    }
    public function home(HomeRequest $request){
        $results = $this->mapRepository->get_home($request);

        if($results->count() > 0){
            return $this->success_response(
                $results,
                "Rides found"
            );
        }
        else{
            return $this->error_response(
                $results,
                "Create your ride request to take benefit"
            );
        }
    }
    public function search(SearchRequest $request){
        $results = $this->mapRepository->search($request);

        if($results->count() > 0){
            return $this->success_response(
                $results,
                "Search Result"
            );
        }
        else{
            return $this->error_response(
                $results,
                "Create your request for others"
            );
        }
    }
}
