<?php

namespace AXLMedia\UrlShortener;

class UrlShortener
{
    /**
     * The service API url.
     * @var string
     */
    const API_URL = 'http://s.hort.pw/api';

    /**
     * The API key for the serivce.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->apiKey = $key;
    }

    /**
     * Get the URL on which the request will be made.
     *
     * @return string
     */
    public function url($endpoint = '/shorten'): string
    {
        return (string) self::API_URL.$endpoint.'?api_token='.$this->apiKey;
    }

    /**
     * Shorten a long URL.
     *
     * @param string $longUrl The long URL which will be shortened.
     * @return string
     */
    public function shortenUrl(string $longUrl)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $request = $client->request('POST', $this->url('/shorten'), ['form_params' => ['url' => $longUrl]]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return @json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        return @json_decode($request->getBody(), true);
    }

    /**
     * Shorten & get just the short URL.
     */
    public function shorten(string $longUrl)
    {
        $data = $this->shortenUrl($longUrl);

        return $data['data'] ?? $data['data']['short_url'];
    }
}
