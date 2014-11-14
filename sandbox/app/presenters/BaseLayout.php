<?php

class BaseLayout
{

	function setTemplate($template)
	{
		$template->addFilter('xxx', function(){});
		$template->var = 123;
	}

}



trait BaseLayoutTrait
{
	/** @var \BaseLayout  @inject */
	public $layout;

	function beforeRender()
	{
		$this->layout->setTemplate($this->template);
	}

}