<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 14:14
     */

    namespace App\Services\CurrencyTwoServices;

    use App\Utilities\CurrencyTwoClient\CurrencyTwoClient;

    abstract class BaseService
    {
        protected $currencyTwoClient = null;

        public function __construct()
        {
            $this->currencyTwoClient = new CurrencyTwoClient();
        }
    }