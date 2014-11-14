<?php

class GrayControl extends Nette\Application\UI\Control
{
	/** @persistent */
	public $level = 50;

	function loadState(array $params)
	{
		parent::loadState($params);
		$this->level = min(max($this->level, 0), 255);
	}

	function render()
	{
		//$this->getParameter('level');
		// $this->getParameter('val)
		$this->template->render(__DIR__ . '/template.latte', array(
			'level' => $this->level,
		));
	}

	function handleChange($level)
	{
		//$this->level = $val;
	}

}