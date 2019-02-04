<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 14:28
     */

    namespace App\Services\CurrencyTwoServices;

    class CurrencyTwoService extends BaseService
    {
        public $business_name = 'CurrencyTwo';

        public function get()
        {
            $currencies = $this->currencyTwoClient->get('5a74524e2d0000430bfe0fa3');

            return $this->converter($currencies);
        }

        public function converter($currencies)
        {
            foreach ($currencies as $currency) {
                if ($currency['kod'] == 'DOLAR') {
                    $response['USD'] = (double) $currency['oran'];
                } elseif ($currency['kod'] == 'AVRO') {
                    $response['EUR'] = (double) $currency['oran'];
                } elseif ($currency['kod'] == 'İNGİLİZ STERLİNİ') {
                    $response['GBP'] = (double) $currency['oran'];
                } else {
                    continue;
                }
            }

            return $response;
        }
    }