<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 20:59
     */

    namespace App\Services\CurrencyThereServices;

    interface CurrencyThereServiceInterface
    {
        public function get();
        public function usd();
        public function gbp();
        public function euro();
    }