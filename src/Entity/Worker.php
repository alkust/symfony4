<?php

namespace App\Entity;

use\App\Entity\Job;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkerRepository")
 */
class Worker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

     private $id ;


     public function getId ()
     {
       return $this->id;
     }
     /**
      *@ORM\Column(type="string" , length=255)
      *
      *@var string
      */
     private $lastName = '';
     public function setlastName ($lastName) {
       $this->lastName = $lastName;
       return $this;
     }

     /**
      *@return string
      *
      */
     public function getlastName(){
       return $this->lastName;
     }

     /**
      *@ORM\Column(type="string" , length=255)
      *
      *@var string
      */
    private $firstName ='';

    public function setfirstName ($firstName)
    {
      $this->firstName = $firstName;
      return $this;
        }

        /**
         *@return string
         *
         */
      public function getfirstName()
      {
      return $this->firstName;
      }

      /**
      *@ORM\ManyToOne(targetEntity="Job" , inversedBy="workers")
      *@var Job
      */

        private $job ;

        /**
        *@param Job $job
        *@return Worker
        */
        public function Setjob(Job $job):Worker
        {
          $this->job = $job;
          return $this;
        }

        public function getjob(): ? Job
        {
          return $this->job;
        }




    /**
       *@ORM\Column(type="decimal" ,precision=5 , scale=2)
       *
       *@var string
       */

    private $workertime='000.00';

    public function setworkertime ($workertime) {
      $this->workertime = $workertime;
      return $this;
    }
    /**
     *@return string
     *
     */
    public function getworkertime()
    {
      return $this->workertime;
    }



      /**
         *@ORM\Column(type="date" , nullable=true)
         *
         *@var \DateTime
         */

      private $date;

      public function setdate (\DateTime $date): Worker {
        $this->date = $date;
        return $this;
      }
      public function getdate(){
        return $this->date;
      }
}
