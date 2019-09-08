<?php

namespace App\Services;

use App\Traits\ConsumirAPIExterna;
use App\Traits\AutorizesRequest;
use App\Traits\InteractResponse;

class RadiosService
{
    use ConsumirAPIExterna, AutorizesRequest, InteractResponse;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.skydata.base_uri');
    }

}