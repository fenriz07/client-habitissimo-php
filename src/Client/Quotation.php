<?php namespace HabitissimoCF7\Repositories\Client;


class Quotation extends GuzzleHttpRequest
{
    private $endpoint = ['/affiliate/quotation'];

    /**
     * Envia la cotización
     * @param token string token de autentificación
     * @param data array parametros a enviar
     *
     * example data = [
     *  'description',
     *  'estimated_date',
     *  'budget_preference',
     *  'zip',
     *  'category_id',
     *  'contact_name',
     *  'contact_mail',
     *  'contact_phone',
     *  'source_campaign',
     *  'source_content',
     *  'terms_and_conditions',
     *  'display_left',
     *  'affiliate_quotation_id',
     * 
     * 
     * ] 
     *
     */
    public function create( $token, $data)
    {
        $this->header['Authorization'] = 'Bearer ' . $token;

        return $this->post( $this->endpoint, $data);
    }
}