<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;

class UserService
{
    use ConsumesExternalServices;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.users.base_uri');
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function handleUsers($results = 10, $nat = 'mx')
    {
        return $this->makeRequest(
            'GET',
            '/api',
            [
                'results' => $results,
                'nat' => $nat,
                'inc' => 'name,picture,email&noinfo'
            ],
        );
    }
}