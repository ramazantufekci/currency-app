<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 12:39
     */

    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use App\Services\{
        CurrencyOneServices\CurrencyOneService,
        CurrencyTwoServices\CurrencyTwoService
    };

    class HomeController extends AbstractController
    {
        public function index()
        {
            $currencyOneService = new CurrencyOneService();
            $currencyTwoService = new CurrencyTwoService();

            $currenciesOne = $currencyOneService->get();
            $currenciesTwo = $currencyTwoService->get();

            $currencies = $this->comparing($currenciesOne, $currenciesTwo);

            return $this->render('home.html.twig', [
                'currencies' => $currencies
            ]);
        }

        function comparing($currenciesOne, $currenciesTwo)
        {
            $currenciesOneCount = count($currenciesOne);
            $currenciesTwoCount = count($currenciesTwo);

            if (($currenciesOneCount === $currenciesTwoCount) || $currenciesOneCount > $currenciesTwoCount) {
                $oneArray = $currenciesOne;
                $twoArray = $currenciesTwo;
            } elseif ($currenciesTwoCount > $currenciesOneCount ) {
                $oneArray = $currenciesTwo;
                $twoArray = $currenciesOne;
            }

            foreach ($oneArray as $key => $value ) {
                if (isset($twoArray[$key])) {
                    $currencies[$key] = $value < $twoArray[$key] ? $value : $twoArray[$key];
                } else {
                    $currencies[$key] = $value;
                }
            }

            return $currencies;
        }
    }