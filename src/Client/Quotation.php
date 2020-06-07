<?php namespace HabitissimoCF7\Repositories\Client;

use HabitissimoCF7\Helpers\DD;
use HabitissimoCF7\Models\OptionModel;

class Quotation extends GuzzleHttpRequest
{
    private $endpoint = ['/affiliate/quotation'];

    public function create( $token, $data)
    {
        $this->header['Authorization'] = 'Bearer ' . $token;

        return $this->post( $this->endpoint, $data);
    }



}