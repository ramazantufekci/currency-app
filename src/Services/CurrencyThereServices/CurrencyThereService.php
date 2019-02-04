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
        public $business_name = 'CurrencyThere';

        public function get()
        {
            $currencies['USD'] = $this->usd();
            $currencies['EUR'] = $this->eur();
            $currencies['GBP'] = $this->gbp();

            return $currencies;
        }

        public function usd()
        {
            return 4.62;
        }

        public function eur()
        {
            return 5.142;
        }

        public function gbp()
        {
            return 5.00011;

        }


    }