<?php

class CommentControl extends Nette\Application\UI\Control
{
	public $dataReader;

	public $onDelete;

	/*function __construct($id)
	{

	}*/

	function render($id)
	{
		$data = call_user_func($this->dataReader, $id);
		$this->template->getLatte()->setLoader(new \Latte\Loaders\StringLoader);
		$this->template->render('
		<p>KOMENTAR {$id} <a n:href="delete $id">smazat</a></p>
		', ['id' => $id]);
	}

	function handleDelete($id)
	{
		$this->onDelete($this, $id);
	}

}