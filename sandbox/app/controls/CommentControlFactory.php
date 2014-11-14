<?php

class CommentControlFactory
{
	private $db;

	function __construct(Nette\Database\Context $db)
	{
		$this->db = $db;
	}

	function create()
	{
		$comment = new \CommentControl;

		$res = Nette\Neon\Neon::decode('
		a:
		b}');

		$comment->dataReader = function($id) {
			return $this->db->query('SELECT 1');
		};
		$comment->onDelete[] = function() {
			$this->db->query('SELECT 1');
		};
		return $comment;
	}

}