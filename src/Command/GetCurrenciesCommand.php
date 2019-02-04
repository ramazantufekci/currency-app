<?php
    /**
     * Created by PhpStorm.
     * User: yeozan
     * Date: 3.02.2019
     * Time: 19:51
     */

    namespace App\Command;

    use App\Entity\Currency;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Console\{
        Command\Command,
        Input\InputInterface,
        Output\OutputInterface,
        Helper\Table
    };
    use App\Services\{
        CurrencyOneServices\CurrencyOneService,
        CurrencyThereServices\CurrencyThereService,
        CurrencyTwoServices\CurrencyTwoService
    };

    class GetCurrenciesCommand extends Command
    {
        private $entityManager;

        public function __construct(EntityManagerInterface $entityManager)
        {
            parent::__construct();

            $this->entityManager = $entityManager;
        }

        protected function configure()
        {
            $this->setName('app:get-currencies')
                ->setDescription('To take currencies and save them in the database');
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $currencyOneService = new CurrencyOneService();
            $currencyTwoService = new CurrencyTwoService();
            $currencyThereService = new CurrencyThereService();

            $currenciesOne = array_merge(
                ['business_name' => $currencyOneService->business_name],
                $currencyOneService->get()
            );
            $currenciesTwo = array_merge(
                ['business_name' => $currencyTwoService->business_name],
                $currencyTwoService->get()
            );
            $currenciesThere = array_merge(
                ['business_name' => $currencyThereService->business_name],
                $currencyThereService->get()
            );

            $this->setCurrency($currenciesOne);
            $this->setCurrency($currenciesTwo);
            $this->setCurrency($currenciesThere);
            $output->writeln(' === Completed. === ');

            $table = new Table($output);
            $table->setHeaders(['BUSINESS NAME', 'USD', 'EUR', 'GBP']);
            $table->setRows([
                $currenciesOne,
                $currenciesTwo,
                $currenciesThere,
            ]);
            $table->render();
        }

        public function setCurrency($currencies)
        {
            $currency = new Currency();

            $currency->setBusinessName($currencies['business_name']);
            $currency->setUSD($currencies['USD']);
            $currency->setEUR($currencies['EUR']);
            $currency->setGBP($currencies['GBP']);
            $currency->setCreateDate(new \DateTime('@'.strtotime('now')));

            $this->entityManager->persist($currency);
            $this->entityManager->flush();
        }
    }