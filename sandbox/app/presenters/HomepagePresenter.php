<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	function __construct(\FormFactory $ff)
	{
		//dump($ff->create(123));
	}

	function inject()
	{
		//dump($this->getUser());

	}

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}


