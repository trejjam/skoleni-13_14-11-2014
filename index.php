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
		//dump($node);
	}

	function nodeClosed(Latte\MacroNode $node)
	{
		//dump($node);
		$node->openingCode = '<b>';
		$node->closingCode = '</b>';
	}

}


class BoldMacro2 extends Latte\Macros\MacroSet
{
	function install()
	{
		//$latte->addMacro('bold', $this);
		$this->addMacro('bold', 'echo %node.args', 'echo "</b>"');
	}
}


$latte->onCompile[] = function($latte) {
	$macro = new BoldMacro2($latte->getCompiler());
	$macro->install();
	//$latte->addMacro('bold', new BoldMacro2);
};

echo $latte->compile('
{if true}
	{bold 123, 567 |trim}{$var}{/bold}
{/if}
');


/*
$latte->render('
	<p>{$var}</p>

', array(
	'var' => 123,
));
*/