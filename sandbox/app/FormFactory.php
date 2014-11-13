<?php

interface FormFactory
{

	/** @return Nette\Application\UI\Form */
	function create($a);

}


class MyTranslator implements Nette\Localization\ITranslator
{
	function translate($s, $plural = NULL)
	{}
}