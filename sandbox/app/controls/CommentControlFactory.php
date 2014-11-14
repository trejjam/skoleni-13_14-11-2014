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
		$comment->onDelete[] = function() {
			$this->db->query('SELECT 1');
		};
		return $comment;
	}

}