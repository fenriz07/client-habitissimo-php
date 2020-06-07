<?php namespace Fenriz\HabitissimoClient\Client;


class Auth extends GuzzleHttpRequest
{
    private $endpoint = ['oauth/token'];

    /**
     * Autentifica el usuario
     * 
     * @param array $data  constituido con la siguente información
     *  client_id
     *  client_secret
     *  username
     *  password
     * 
     * @return array constituido por: 
     *  token_type
     *  access_token
     *  refresh_token
     *  expires_in 
     *  scope
     */
    public function login( array $data )
    {
        $data['grant_type'] = 'password';
        return $this->post( $this->endpoint, $data);
    }

    /**
     * Refrescar token
     * 
     * @param array $auth  constituido con la siguente información
     *  client_id
     *  client_secret
     *  co
     * 
     * @return array constituido por: 
     *  token_type
     *  access_token
     *  refresh_token
     *  expires_in 
     *  scope
     */

    public function refresh( array $auth )
    {

        $data = [];

        $data['refresh_token'] = $auth['refresh_token'];
        $data['client_id']     = $auth['client_id'];
        $data['client_secret'] = $auth['client_secret'];
        $data['grant_type']    = 'refresh_token';


        return $this->post( $this->endpoint, $data);

    }

}

