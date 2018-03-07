<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id=0;

    /**
    *@ORM\Column(type="string" , length=255)
    *@var string
    *
    */
    private $title ='';

    /**
    *@ORM\Column(type="text" , length=255)
    *@var string
    *
    */
    private $summary ='';

    /**
    *@ORM\Column(type="decimal" ,precision=5 , scale=2)
    *@var string
    *
    */
    private $wage = '';

    /**
    *@ORM\OneToMany(targetEntity="worker" ,mappedBy="job")
    *@var
    */
    private $workers;

    public function setWorkers($workers)
    {
      $this->workers = $workers;
      return $this;
    }

    public function getWorkers(): Collection
    {
      return $this->workers;
    }

    public function __construct()
    {
      $this->workers = new ArrayCollection();
    }


  public function addWorker(Worker $workers): Job
        {
          $this->workers->add($workers);
          return $this;
        }

    public function removeWorker(Worker $workers): Job
    {
      $this->workers->removeElement($workers);
      return $this;
    }


    public function getId(){
        return $this->id;
    }
    public function setTitle($title):Job{
       $this->title = $title;
         return $this;
    }

    public function getTitle(){
      return $this->title;
    }

    public function setSummary($summary):Job{
      $this->summary = $summary;
      return $this;
    }

    public function getSummary(){
      return $this->summary;
    }




    public function setWage($wage):Job{
       $this->wage = $wage;
         return $this;
    }

    public function getWage(){
      return $this->wage;
    }
}
