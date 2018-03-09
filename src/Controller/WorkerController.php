<?php

namespace App\Controller;

use App\Entity\Worker;
use App\Form\WorkerType;
use App\Repository\WorkerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\EntityManagerInterface;



/**
*@Route("/worker")
*/
class WorkerController extends Controller
{

    /**
     * @Route("/")
     */
    public function index(WorkerRepository $respository)
    {

      $form = $this
        ->createFormBuilder(null , ['method' => 'DELETE'  ])
        ->getForm();

        return $this->render('worker/index.html.twig', [
            'controller_name' => 'MyWorker',
            'worker' => $respository->findall(),
            'form'=> $form->createView(),
        ]);
    }

/**
*@Route("/create")
*@method{{'GET', 'PUT'}}
*/
public function create(
  Request $request,
  EntityManagerInterface $manager
   ): Response
     {

       $form = $this->createForm(WorkerType :: class , new Worker() , [
               'method'=> 'PUT',
       ]);

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()){
              $manager->persist($form->getData());
              $manager->flush();
              $this->addFlash('success' , 'Employé est bien Ajouté');


          return    $this->redirectToRoute('app_worker_index');


          }
         return $this->render('worker/create.html.twig', [
              'controller_name' => 'MyWorker',
              'form'=> $form->createView(),


                ]);
    }


    /**
    *@Route("/newForm")
    *@method{{'GET', 'PUT'}}
    */
    public function newForm(
      Request $request,
      EntityManagerInterface $manager
       ): Response
         {

           $form = $this->createForm(WorkerType :: class , new Worker() , [
                   'method'=> 'PUT',
           ]);

              $form->handleRequest($request);

              if ($form->isSubmitted() && $form->isValid()){
                  $manager->persist($form->getData());
                  $manager->flush();
                  $this->addFlash('success' , 'Employé est bien Ajouté');


              return    $this->redirectToRoute('app_worker_index');


              }
             return $this->render('worker/newForm.html.twig', [
                  'controller_name' => 'MyWorker',
                  'form'=> $form->createView(),


                    ]);
        }

    /**
    *@Route("/edit/{id}")
    *@Method{{'GET', 'POST'}}
    */
    public function edit(

      Worker $worker,
      Request $request,
      EntityManagerInterface $manager
       ): Response
         {
           $form = $this->createForm(WorkerType :: class , $worker);
              $form->handleRequest($request);

              if ($form->isSubmitted() && $form->isValid())
              {
                  $manager->flush();
                  $this->addFlash('success' , 'Employé mis a jour');
        return    $this->redirectToRoute('app_worker_index');


              }

             return $this->render('worker/create.html.twig',
                [
                  'controller_name' => 'MyWorker',
                  'form'=> $form->createView(),
                  ]);
        }


            /**
            *@Route("/delete/{id}")
            *
            *@Method("DELETE")
            */
public function delete(Worker $worker,EntityManagerInterface $manager): Response
       {
          $manager->remove($worker);
          $manager->flush();
          $this->addFlash('success' , 'Supprimer un employeur');
   return $this->redirectToRoute('app_worker_index');


       }


/**
*@Route("/show/{id}")
*@Method("GET")
 *@return Response
 */
  public function show(

         WorkerRepository $respository
                      ): Response
              {
                return $this->render('worker/show.html.twig',
                   [
                     'controller_name' => 'MyWorker',
                     'worker' =>$respository->findall(),

                    ]);
              }





}
