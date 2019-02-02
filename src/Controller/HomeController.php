<?php
    /**
     * Created by PhpStorm.
     * User: yemre
     * Date: 2.02.2019
     * Time: 12:39
     */

    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class HomeController extends AbstractController
    {
        public function index()
        {
            return $this->render('home.html.twig', [
                'name' => 'Yunus Emre',
            ]);
        }
    }