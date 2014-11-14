<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 * @persistent(gray1)
 */
class HomepagePresenter extends BasePresenter
{

	public function createComponentGray1()
	{
		return new \GrayControl;
	}

	public function createComponentGray2()
	{
		return new \GrayControl;
	}

}
