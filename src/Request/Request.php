<?php

namespace Claroline\API\Request;

class Request
{
    private $url;
    private $method;
    private $host;
    private $queryString;
    private $body;

    public function __construct(
        $url,
        $method      = 'GET',
        $host        = 'localhost',
        $queryString = [],
        $body        = null
    ) {
        $this->url         = $url;
        $this->method      = $method;
        $this->host        = $host;
        $this->queryString = $queryString;
        $this->body        = $body;
    }

    public function send()
    {
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL            => $this->host . '/' . $this->url.'?'.http_build_query($this->queryString),
            CURLOPT_CUSTOMREQUEST  => $this->method
        ];

        $ch = curl_init();

        foreach ($options as $option => $value) {
            curl_setopt($ch, $option, $value);
        }

        $response = curl_exec($ch);

        var_dump($options);
        var_dump($response);
        curl_close($ch);

        return $response;
    }
}
