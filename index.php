<?php

require 'sandbox/vendor/autoload.php';

Tracy\Debugger::enable(FALSE);

$latte = new Latte\Engine;
$latte->setLoader(new Latte\Loaders\StringLoader);

class BoldMacro implements Latte\IMacro
{
	function initialize() {}

	function finalize() {}

	function nodeOpened(Latte\MacroNode $node)
	{
		dump($node);
	}

	function nodeClosed(Latte\MacroNode $node)
	{
		dump($node);
	}

}

$latte->onCompile[] = function($latte) {
	$latte->addMacro('bold', new BoldMacro);
	//$latte->addMacro('bold', new BoldMacro2);
};

echo $latte->compile('
	{bold 123 |trim}{$var}{/bold}
');


/*
$latte->render('
	<p>{$var}</p>

', array(
	'var' => 123,
));
*/