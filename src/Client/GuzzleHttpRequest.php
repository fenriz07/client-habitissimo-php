<?php namespace Fenriz\HabitissimoClient\Client;

class GuzzleHttpRequest
{
    protected $client;
    public    $translator;

    protected $header = [
        'Accept'        => 'application/json'
    ];

    /*private   $header = [
        'headers' => 
                    [
                        'Authorization' => 'Bearer Ox0yITUBgcgM82e4JauGdp5b9XBpgkwzGeOUVDH0YNg=$2',
                        'Accept'        => 'application/json',
                    ],
    ];*/

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'http://api.habitissimo.es/',
            'timeout'  => 30.0,
        ]);
    }

    protected function get($url, $header = [])
    {

        $url = implode("/", $url);


        try {
            $response = $this->client->request('GET', $url, $this->header);
        } catch (\Exception $e) {
            dd($e);
        }

        return  $this->responsePatron($response);
    }

    protected function post($url, $data)
    {
        $url = implode("/", $url);

        $response = $this->client->request('POST', $url, [
            'headers'     => $this->header,
            'form_params' => $data,
        ]);

        //dd($response->getBody()->getContents());

        return  $this->responsePatron($response);
    }

    private function responsePatron($response)
    {
        return  json_decode($response->getBody()->getContents(), true);
    }
}
