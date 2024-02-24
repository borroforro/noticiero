<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;

class NewsService
{
    use ConsumesExternalServices;

    protected $baseUri;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUri = config('services.paypal.base_uri');
        $this->apiKey = config('services.paypal.apiKey');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['apiKey'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        return "{$this->apiKey}";
    }

    public function handleNews(Request $request, $country = 'mx', $pageSize = 10)
    {
        return $this->makeRequest(
            'POST',
            '/v2/everything',
            [],
            [
                'country' => $country,
                'sortBy' => 'popularity',
                'pageSize' => $pageSize
            ],
        );
    }
}