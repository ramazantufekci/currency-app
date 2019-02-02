<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 14:28
     */

    namespace App\Services\CurrencyOneServices;

    class CurrencyOneService extends BaseService
    {
        public function get()
        {
            $currencies = $this->currencyOneClient->get('5a74519d2d0000430bfe0fa0');

            return $this->converter($currencies);
        }

        public function converter($currencies)
        {
            foreach ($currencies as $currency) {
                if ($currency['symbol'] == 'USDTRY') {
                    $response['USD'] = (double) $currency['amount'];
                } elseif ($currency['symbol'] == 'EURTRY') {
                    $response['EUR'] = (double) $currency['amount'];
                } elseif ($currency['symbol'] == 'GBPTRY') {
                    $response['GBP'] = (double) $currency['amount'];
                } else {
                    continue;
                }
            }

            return $response;
        }
    }