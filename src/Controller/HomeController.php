<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 12:39
     */

    namespace App\Controller;

    use App\Entity\Currency;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use App\Services\{
        CurrencyOneServices\CurrencyOneService,
        CurrencyTwoServices\CurrencyTwoService,
        CurrencyThereServices\CurrencyThereService
    };

    class HomeController extends AbstractController
    {
        public function index()
        {
            $currencyOneService = new CurrencyOneService();
            $currencyTwoService = new CurrencyTwoService();
            $currencyThereService = new CurrencyThereService();

            $currenciesOne = $currencyOneService->get();
            $currenciesTwo = $currencyTwoService->get();
            $currenciesThere = $currencyThereService->get();

            $currencies = $this->comparing([ $currenciesOne, $currenciesTwo, $currenciesThere ]);

            $currenciesAll = $this->getDoctrine()
                ->getRepository(Currency::class)
                ->findAll();

            return $this->render('home.html.twig', [
                'currencies' => $currencies,
                'currenciesAll' => $currenciesAll,
            ]);
        }

        private function comparing($arrays = [])
        {
            $arrayOne = $arrays[0];
            $arrayTwo = $arrays[1];

            $arrayOneCount = count($arrayOne);
            $arrayTwoCount = count($arrayTwo);

            if (($arrayOneCount === $arrayTwoCount) || $arrayOneCount > $arrayTwoCount) {
                $oneArray = $arrayOne;
                $twoArray = $arrayTwo;
            } elseif ($arrayTwoCount > $arrayOneCount) {
                $oneArray = $arrayTwo;
                $twoArray = $arrayOne;
            }

            foreach ($oneArray as $key => $value) {
                if (isset($twoArray[$key])) {
                    $currencies[$key] = $value < $twoArray[$key] ? $value : $twoArray[$key];
                } else {
                    $currencies[$key] = $value;
                }
            }

            if (isset($arrays[2])) {
                $arrays = array_splice($arrays, 2, 2);
                $currencies = $this->comparing(array_merge([$currencies], $arrays));
            }

            return $currencies;
        }
    }