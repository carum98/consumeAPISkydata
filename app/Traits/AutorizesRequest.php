<?php

namespace App\Traits;
use App\Services\AutenticationService;

/**
 * Trait para realizar la autorisacion
 */
trait AutorizesRequest
{
    public function resolveAutorization(&$queryParams, &$formParams, &$headers)
    {
        $accessToken = $this->resolveAccessToken();
        $headers['Authorization'] = $accessToken;
    }

    public function resolveAccessToken()
    {
        $autenticationService = resolve(AutenticationService::class);
        if (auth()->user()) {
            return $autenticationService->getAutenticatedUserToken();
        }
        return $autenticationService->getClientCredencialsToken();
    }
}
