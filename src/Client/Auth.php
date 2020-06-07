<?php namespace Fenriz\HabitissimoClient\Client;


class Auth extends GuzzleHttpRequest
{
    private $endpoint = ['oauth/token'];

    /**
     * Autentifica el usuario
     * 
     * @param string $data arreglo constituido con la siguente información
     *  client_id
     *  client_secret
     *  username
     *  password
     */
    public function login( array $data )
    {
        $data['grant_type'] = 'password';
        
        return $this->post( $this->endpoint, $data);
    }

    public function refresh( $auth )
    {

        $data = [];

        $data['refresh_token'] = $auth->refresh_token;
        $data['grant_type']    = 'refresh_token';
        
        $option = OptionModel::getOptions();

        $data['client_id']     = $option['client_id'];
        $data['client_secret'] = $option['client_secret'];

        return $this->post( $this->endpoint, $data);

    }

}

