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
	/** @var \CommentControlFactory @inject */
	public $commentFactory;

	/** @var \BaseLayout  @inject */
	public $layout;


	function beforeRender()
	{
		$this->layout->setTemplate($this->template);
	}


	public function createComponentGray1()
	{
		return new \GrayControl;
	}

	public function createComponentGray2()
	{
		return new \GrayControl;
	}

	function createComponentMulti()
	{
		return new Nette\Application\UI\Multiplier(function($id) {
			return new \GrayControl;
		});
	}

	function createComponentComment()
	{
		$comment = $this->commentFactory->create();
		$comment->onDelete[] = function() {
			$this->redirect('default');
		};
		return $comment;
	}

}
