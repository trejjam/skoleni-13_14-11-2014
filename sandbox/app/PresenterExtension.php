<?php

class PresenterExtension extends Nette\DI\CompilerExtension
{
	private $defaults = array(
		'data' => NULL,
		'hello' => '',
	);

	private $classes;

	function __construct(array $classes)
	{
		$this->classes = $classes;
	}

	function loadConfiguration()
	{
		$config = $this->getConfig($this->defaults);
		//dump($config);

		$this->validateConfig($this->defaults);

		$builder = $this->getContainerBuilder();
		//$builder->addDependency(__FILE__);
		$counter = 1;

		foreach ($this->classes as $class) {
			$rc = new \ReflectionClass($class);
			if ($rc->isSubclassOf('Nette\Application\UI\Presenter')
				&& $rc->isInstantiable()
			) {
				$builder->addDefinition($this->prefix($counter++))
					->setFactory($class)
					->setInject(TRUE);
			}
		}

		/*$builder->addDefinition('pokus')
			->setFactory('stdClass')
			->addSetup('setXyz', [123, 456]);*/
	}

}