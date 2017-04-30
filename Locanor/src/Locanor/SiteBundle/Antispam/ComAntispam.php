<?php

namespace Locanor\SiteBundle\Antispam;

class ComAntispam
{
	private $mailer;
	private $locale;
	private $minLenght;


	public function _contruc(\Swift_Mailer $mailer, $minLenght)

	{
		$this->mailer    =$mailer;
		$this->minLenght =(int) $minLenght;
	}

    public function setLocale($locale)
    {
    	$this->locale = $locale;
    }


public function isSpam($text)
{
	return strlen($text)<$this ->minLenght;
}

}