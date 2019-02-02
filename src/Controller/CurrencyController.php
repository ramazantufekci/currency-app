<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 21:07
     */

    namespace App\Controller;

    use App\Services\CurrencyThereServices\CurrencyThereService;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;

    class CurrencyController extends AbstractController
    {
        public function index()
        {
            $service = new CurrencyThereService();

            $response = json_encode($service->get());

            return new Response(
                $response,
                Response::HTTP_OK,
                ['Content-Type', 'application/json']
            );
        }
    }