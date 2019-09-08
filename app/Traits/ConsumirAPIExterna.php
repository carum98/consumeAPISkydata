<?php

namespace App\Traits;

use GuzzleHttp\Client;

/**
 * Trait para consumir API Extena
 */
trait ConsumirAPIExterna
{
    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [])
    {
        $cliente = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if (method_exists($this, 'resolveAutorization')) {
            $this->resolveAutorization($queryParams, $formParams, $headers);
        }

        $response = $cliente->request($method, $requestUrl, [
            'query' => $queryParams,
            'form_params' => $formParams,
            'headers' => $headers
        ]);

        $response = $response->getBody()->getContents();

        if (method_exists($this, 'decodeResponse')) {
            $response = $this->decodeResponse($response);
        }

        if (method_exists($this, 'checkIfErrorRespose')) {
            $this->checkIfErrorRespose($response);
        }

        return $response;
    }
}
