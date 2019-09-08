<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\RadiosService;

class Controller extends BaseController
{
    protected $radioService;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(RadiosService $radioService)
    {
        $this->$radioService = $radioService;
    }
}
