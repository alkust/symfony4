<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MyControController extends Controller
{
    /**
     * @Route("/my")
     */
    public function index()
    {
        return $this->render('my_contro/index.html.twig', [
            'controller_name' => 'MyControController',
            'list' => [ 'id' => 1,
                        'name' => 'Jean',
                        'age' => 30

            ]
        ]);
    }
}
