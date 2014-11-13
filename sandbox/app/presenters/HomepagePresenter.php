<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	function __construct(\PDO $pdo)
	{

	}

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
