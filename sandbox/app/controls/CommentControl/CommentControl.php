<?php

class CommentControl extends Nette\Application\UI\Control
{
	/*function __construct($id)
	{

	}*/

	function render($id)
	{
		$this->template->getLatte()->setLoader(new \Latte\Loaders\StringLoader);
		$this->template->render('<p>KOMENTAR {$id}</p>', ['id' => $id]);
	}

}