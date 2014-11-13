<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

$configurator->setDebugMode(TRUE); // enable for your remote IP
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->addParameters([
	'ahoj' => 'hello',
]);

$loader = $configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->onCompile[] = function($configurator, $compiler) use ($loader) {
	$classes = array_keys($loader->getIndexedClasses());
	$ext = new PresenterExtension($classes);
	$compiler->addExtension('presenter', $ext);
};

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

return $container;
