<?php

namespace App\Traits;


/**
 * Trait para interactura con la respues
 */
trait InteractResponse
{
    public function decodeResponse($response)
    {
        $decodeResponse = json_decode($response);
        // dd($decodeResponse);
        return $decodeResponse->data->data ?? $decodeResponse->data;
    }

    public function checkIfErrorRespose($response)
    {
        if (isset($response->error)) {
            throw new Exception("Algo Fallo: {$response->error}");
        }
    }
}
