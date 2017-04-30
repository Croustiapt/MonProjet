<?php

namespace Locanor\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LocanorUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
