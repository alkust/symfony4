<?php

namespace App\Form;

use App\Entity\Worker;
use App\Entity\Job;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lastName'  )
        ->add('firstName')
        ->add('job', Entitytype::class, [
        'class' => Job::class,
        'choice_label' => 'title',

  ])
        ->add('workertime')
        ->add('date' ,null , ['widget'=> 'single_text']) ;
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
