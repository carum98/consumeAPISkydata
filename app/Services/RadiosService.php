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

    public function getRadios()
    {
        return $this->makeRequest('GET','radio');
    }

    public function getClientes()
    {
        return $this->makeRequest('GET','cliente');
    }

    public function getRadio($id)
    {
        return $this->makeRequest('GET','radio/'.$id);
    }

    public function getCliente($id)
    {
        return $this->makeRequest('GET','cliente/'.$id);
    }

    public function getClienteRadios($id)
    {
        return $this->makeRequest('GET',"cliente/{$id}/radios");
    }

    public function getUserInformation()
    {
        return $this->makeRequest('GET',"me");
    }

    public function createCliente($formParams)
    {
        return $this->makeRequest('POST','cliente',[],$formParams);
    }
    
    public function createRadio($formParams)
    {
        return $this->makeRequest('POST', 'radio', [], $formParams);
    }
}