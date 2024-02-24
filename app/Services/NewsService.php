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
        $this->baseUri = config('services.news.base_uri');
        $this->apiKey = config('services.news.apiKey');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['X-Api-Key'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        return "{$this->apiKey}";
    }

    public function handleNews($q = 'bitcoin',$pageSize = 10, $language = 'es')
    {
        return $this->makeRequest(
            'GET',
            '/v2/everything',
            [
                'q' => $q,
                'sortBy' => 'popularity',
                'pageSize' => $pageSize,
                'language' => $language,
            ],
        );
    }
}