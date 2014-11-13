<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	function __construct($path)
	{
	}

	function inject()
	{
		dump($this->getUser());

	}

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
