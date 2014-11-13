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
