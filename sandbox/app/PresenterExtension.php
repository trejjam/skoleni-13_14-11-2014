<?php

class PresenterExtension extends Nette\DI\CompilerExtension
{
	private $defaults = array(
		'data' => NULL,
		'hello' => '',
	);

	function __construct($loader)
	{


	}

	function loadConfiguration()
	{
		$config = $this->getConfig($this->defaults);
		//dump($config);

		$this->validateConfig($this->defaults);

		$builder = $this->getContainerBuilder();
		//$builder->addDependency(__FILE__);

		$builder->addDefinition('pokus')
			->setFactory('stdClass')
			->addSetup('setXyz', [123, 456]);
	}

}