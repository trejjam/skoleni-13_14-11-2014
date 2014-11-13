<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	/** @var \PDO */
	private $pdo;

	function injectBase(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}


}
