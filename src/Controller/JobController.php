<?php

namespace App\Controller;
use App\Repository\JobRepository;
use App\Entity\Job;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JobController extends Controller
{
    /**
     *@Route("/job")
     */
    public function index(JobRepository $repository): Response
    {
        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
            'Jobs' => $repository->findall(),
        ]);
    }
}
