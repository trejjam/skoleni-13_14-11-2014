<?php

class PdoFactory
{

	static function create()
	{
		$pass = time() % 2 ? 'xxx' : 'yyy';
		$pdo = new PDO('mysql:host=127.0.0.1', 'root', $pass);
		return $pdo;
	}

}
