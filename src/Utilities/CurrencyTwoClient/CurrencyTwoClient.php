<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 14:16
     */

    namespace App\Utilities\CurrencyTwoClient;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;

    class CurrencyTwoClient
    {
        protected $client = null;

        public function __construct()
        {
            $this->client = new Client([
                'base_uri' => getenv('CURRENCY_TWO_API'),
                'timeout' => '0.0',
                'http_errors' => false,
            ]);
        }

        public function get($url)
        {
            $response = $this->request('GET', $url);

            return $this->response($response);
        }

        public function request($method, $url)
        {
            try {
                $response = $this->client->request($method, $url);
            } catch (ClientException $e) {
                $response = null;
                // log.
            }

            return $response;
        }

        private function response($response)
        {
            $responseBody = (string) $response->getBody();

            return json_decode($responseBody, true);
        }
    }