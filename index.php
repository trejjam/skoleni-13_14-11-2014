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
		$this->addMacro('bold',
		 //'echo %escape(%modify($presenter->link(%node.word, %node.array?)))',
		 [$this, 'boldOpened'],
		 'echo "</b>"',
		 'AHOJ'
		);
	}

	function boldOpened($node, $writer)
	{
		//dump($node);
		return $writer->write('echo %escape(%modify($presenter->link(%node.word, %node.array?)))');
	}

}

$latte->addFilter('xx', function($s) {
	return new Latte\Runtime\Html('**' . $s . '**');
});

$latte->addFilter(NULL, function($name, $s) {
	return $s;
});



$latte->onCompile[] = function($latte) {
	$macro = new BoldMacro2($latte->getCompiler());
	$macro->install();
	//$latte->addMacro('bold', new BoldMacro2);
};

/*echo $latte->compile('
{$var}

<body title=ahoj>
{if true}
	<p id=123 n:bold>
	{bold presenter:action  |trim}{$var}{/bold}
	</p>
{/if}
</body>
');*/



$latte->render('
	<p>{$var|yyy}</p>

', array(
	'var' => '<b>',
));
