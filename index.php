<?php

require 'sandbox/vendor/autoload.php';

$latte = new Latte\Engine;
$latte->setLoader(new Latte\Loaders\StringLoader);

echo $latte->compile('
	<p>{$var}</p>
');

$latte->render('
	<p>{$var}</p>

', array(
	'var' => 123,
));
