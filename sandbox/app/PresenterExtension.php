<?php

class PresenterExtension extends Nette\DI\CompilerExtension
{

	function loadConfiguration()
	{
		$config = $this->getConfig();
		dump($config);
	}

}