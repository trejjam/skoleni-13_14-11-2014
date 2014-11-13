<?php

class PdoFactory
{

	/**
	 * @return PDO
	 */
	static function create($dsn, $user)
	{
		//$pass = time() % 2 ? 'xxx' : 'yyy';
		$pass = 'xxx';
		$pdo = new PDO($dsn, $user, $pass);
		return $pdo;
	}

}


class PdoFactory2
{
	private $dsn;

	function __construct($dsn)
	{
		$this->dsn = $dsn;
	}

	/**
	 * @return PDO
	 */
	function create($user)
	{
		//$pass = time() % 2 ? 'xxx' : 'yyy';
		$pass = 'xxx';
		$pdo = new PDO($this->dsn, $user, $pass);
		return $pdo;
	}

}