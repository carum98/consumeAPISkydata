<?php

namespace App\Services;

use App\Traits\ConsumirAPIExterna;
use App\Traits\InteractResponse;

class AutenticationService
{
    use ConsumirAPIExterna, InteractResponse;

    protected $baseUri;
    protected $clientId;
    protected $clientSecret;
    protected $passwordClientId;
    protected $passwordClientSecret;

    public function __construct()
    {
        $this->baseUri = config('services.skydata.base_uri');
        $this->clientId = config('services.skydata.client_id');
        $this->clientSecret = config('services.skydata.client_secret');
        $this->passwordClientId = config('services.skydata.password_client_id');
        $this->passwordClientSecret = config('services.skydata.password_cliente_secret');
    }

    public function getClientCredencialsToken()
    {
        if ($token = $this->existingValidClientCredentials()) {
            return $token;
        }
        $formParams = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ];
        $tokenData = $this->makeRequest('POST', 'oauth/token', [], $formParams);

        $this->storeValidToken($tokenData, 'client_credentials');
        return $tokenData->access_token;
    }

    public function storeValidToken($tokenData, $grant_type)
    {
        $tokenData->expires_in = now()->addSecond($tokenData->expires_in - 5);
        $tokenData->access_token = "{$tokenData->token_type} {$tokenData->access_token}";
        $tokenData->grant_type = $grant_type;
        session()->put(['current_token' => $tokenData]);
    }

    public function resolveAuthorizationUrl()
    {
        $query = http_build_query( [
            'client_id' => $this->clientId,
            'redirect_uri' => route('authorization'),
            'response_type' => 'code',
            // 'scope' => 'create-radio'
        ]);

        return "{$this->baseUri}/oauth/authorize?{$query}";
    }

    public function getCodeToken($code)
    {
        $formParams = [
            'grant_type' => 'authorization_code',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => route('authorization'),
            'code' => $code
        ];
        $tokenData = $this->makeRequest('POST', 'oauth/token', [], $formParams);

        $this->storeValidToken($tokenData, 'authorization_code');
        return $tokenData;
    }

    public function existingValidClientCredentials()
    {
        if (session()->has('current_token')) {
            $tokenData = session()->get('current_token');
            if (now()->lt($tokenData->expires_in)) {
                return $tokenData->access_token;
            }
        }
        return false;
    }

    public function getPasswordToken($username, $password)
    {
        $formParams = [
            'grant_type' => 'password',
            'client_id' => $this->passwordClientId,
            'client_secret' => $this->passwordClientSecret,
            'username' => $username,
            'password'=> $password
        ];

        $tokenData = $this->makeRequest('POST', 'oauth/token', [], $formParams);

        $this->storeValidToken($tokenData, 'password');
        return $tokenData;
    }
}