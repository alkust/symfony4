<?php

namespace App\Form;

use App\Entity\Worker;
use App\Entity\Job;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class WorkerType extends AbstractType
{


    /**
    *@var AuthorizationCheckerInterface
    */
    private $checker;


    /**
    *@param AuthorizationCheckerInterface $checker
    */
    public function __construct(AuthorizationCheckerInterface $checker )
    {
      $this->checker = $checker;

    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
        ->add('lastName'  )
        ->add('firstName')
        ->add('job', Entitytype::class, [
        'class' => Job::class,
        'choice_label' => 'title',
        'disabled'=>!$this->checker->isGranted('ROLE_MANAGER'),
  ])
        ->add('workertime' , null ,[
          'disabled'=>!$this->checker->isGranted('ROLE_MANAGER'),
        ])
        ->add('date' ,null , ['widget'=> 'single_text' ,
        'disabled'=>!$this->checker->isGranted('ROLE_MANAGER'),
          ]) ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Worker::class,
              'label_format'=> 'worker.field.%name%',
        ]);
    }
}
