<?php

class GrayControl extends Nette\Application\UI\Control
{

	function render()
	{
		$this->template->render(__DIR__ . '/template.latte', array(
			'level' => 50,
		));
	}

}