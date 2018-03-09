<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Translation\TranslatorInterface;

/**
*@Route("/")
*/
class Greeter
{
/**
*@var
*/
private $translator;

/**
*@param TranslatorInterface $translator
*/
  public function __construct(TranslatorInterface $translator)
  {
    $this->translator = $translator;
  }

  /**
  *@param User $user
  *@return
  */
  public function greet(User $user):string
  {
    $name= $user->getWorker() ?
    $user->getWorker()->getlastName(). ' '.$user->getWorker()->getfirstName():'A.nonym';
    $this->translator->trans('main.index.user');

    return $this->translator->trans('main.index.welcome', [
      '%name%'=> $name
    ]);
  }
}
