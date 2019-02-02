<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 13:55
     */

    namespace App\Services\CurrencyOneServices;


    use App\Utilities\CurrencyOneClient\CurrencyOneClient;

    abstract class BaseService
    {
        protected $currencyOneClient = null;

        public function __construct()
        {
            $this->currencyOneClient = new CurrencyOneClient();
        }
    }