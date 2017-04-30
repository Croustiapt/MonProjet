<?php

namespace Locanor\SiteBundle\Twig;

use Locanor\SiteBundle\Antispam\ComAntispam;

class AntispamExtension extends \Twig_Extension
{
  /**
   * @var ComAntispam
   */
  private $comAntispam;

  public function __construct(ComAntispam $comAntispam)
  {
    $this->comAntispam = $comAntispam;
  }

  public function checkIfArgumentIsSpam($text)
  {
    return $this->comAntispam->isSpam($text);
  }


public function getFunctions()
{
  return array(new \Twig_SimpleFunction('chekIfSpam',array($this, 'checkIfArgumentIsSpam')),);
}

public function getName()
{
  return 'ComAntispam';
}



}