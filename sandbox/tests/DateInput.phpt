<?php

require 'bootstrap.php';

use Tester\Assert;


Assert::exception(function(){
	$di = new DateInput;
	$di->setValue('xxx');
}, 'InvalidArgumentException');


$di = new DateInput;
$di->setValue(NULL);
Assert::null( $di->getValue() );


$di = new DateInput;
$di->setValue(new DateTime('2014-11-14'));
Assert::equal( new DateTime('2014-11-14'), $di->getValue() );