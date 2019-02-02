<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 14:28
     */

    namespace App\Services\CurrencyThereServices;

    class CurrencyThereService extends BaseService implements CurrencyThereServiceInterface
    {
        public function get()
        {
            $currencies['USD'] = $this->usd();
            $currencies['EURO'] = $this->euro();
            $currencies['GBP'] = $this->gbp();

            return $currencies;
        }

        public function usd()
        {
            return 4.62;
        }

        public function euro()
        {
            return 5.142;
        }

        public function gbp()
        {
            return 5.00011;

        }


    }