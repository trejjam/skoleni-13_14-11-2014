<?php

require 'test-bootstrap.php';
require 'lastChars.php';

use Tester\Assert;


Assert::same( '', lastChars('abc', 0) );
Assert::same( 'c', lastChars('abc', 1) );
Assert::same( 'abc', lastChars('abc', 5) );
Assert::same( '', lastChars('', 1) );
Assert::exception(function(){
	lastChars('', 'x');
}, 'InvalidArgumentException');