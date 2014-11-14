<?php

class BaseLayout
{

	function setTemplate($template)
	{
		$template->addFilter('xxx', function(){});
		$template->var = 123;
	}

}

