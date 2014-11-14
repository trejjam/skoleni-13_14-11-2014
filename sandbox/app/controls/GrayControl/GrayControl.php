<?php

class GrayControl extends Nette\Application\UI\Control
{
	/** @persistent */
	public $level = 50;

	function render()
	{
		$this->template->render(__DIR__ . '/template.latte', array(
			'level' => $this->level,
		));
	}

	function handleChange($val)
	{
		$this->level = $val;
	}

}