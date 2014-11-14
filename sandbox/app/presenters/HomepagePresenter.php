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
	use \BaseLayoutTrait;

	/** @var \CommentControlFactory @inject */
	public $commentFactory;


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
