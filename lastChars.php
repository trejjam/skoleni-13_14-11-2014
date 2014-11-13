<?php


function lastChars($s, $len)
{
	if (!is_int($len)) {
		throw new InvalidArgumentException;
	}
	return $len ? (string) substr($s, -$len) : '';
}



class Article
{
	function __construct(Pdo $database) {

	}

	function save() {
		$this->database->query('....');
	}
}


class MockPdo extends PDO
{
	function __construct()
	{
	}

	function query($s) {
		$this->sql = $s;
	}
}