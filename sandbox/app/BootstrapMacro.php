<?php

use Nette\Forms\Controls;

class BootstrapMacro extends Latte\Macros\MacroSet
{

	static function install($compiler)
	{
		$bm = new self($compiler);
		$bm->addMacro('bootstrapinput', 'BootstrapMacro::render(%node.args)');
	}

	static function render($input)
	{
		if ($input instanceof Controls\Button) {
			echo $input->getControl()->addClass('btn btn-default');
		} elseif ($input instanceof Controls\TextBase) {
			echo $input->getControl()->addClass('form-control');
		} elseif ($input instanceof Controls\Checkbox) {
			echo '<div class="checkbox">' . $input->getControl() . '</div>';
		} else {
			echo $input->getControl();
		}
	}

}
