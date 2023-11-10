<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\HomeRequest;
use App\Repositories\Map\MapRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $mapRepository;

    public function __construct(MapRepositoryInterface $mapRepository)
    {
        $this->mapRepository = $mapRepository;
    }
    public function home(HomeRequest $request){
        return $this->mapRepository->get_home($request);
    }
}
