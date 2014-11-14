<?php

use Nette\Utils\Html,
	Nette\Forms\Form;

class DateInput extends Nette\Forms\Controls\BaseControl
{
	private $day, $month, $year;

	function setValue($val = NULL)
	{
		if (!$val instanceof DateTime && $val !== NULL) {
			throw new InvalidArgumentException;
		}
		if ($val === NULL) {
			$this->day = $this->month = $this->year = NULL;
		} else {
			$this->day = $val->format('j');
			$this->month = $val->format('n');
			$this->year = $val->format('Y');
		}
	}


	function getValue()
	{
		return $this->isValid()
			? new DateTime("$this->year-$this->month-$this->day")
			: NULL;
	}


	function getControl()
	{
		$this->setOption('rendered', true);
		$name = $this->getHtmlName();
		return
			Html::el('input')->name($name . '[day]')->value($this->day)->id($this->getHtmlId())
			. Html::el('input')->name($name . '[month]')->value($this->month)
			. Html::el('input')->name($name . '[year]')->value($this->year);
	}


	function loadHttpData()
	{
		$this->day = $this->getHttpData(Form::DATA_LINE, '[day]');
		$this->month = $this->getHttpData(Form::DATA_LINE, '[month]');
		$this->year = $this->getHttpData(Form::DATA_LINE, '[year]');
	}


	private function isValid()
	{
		return checkdate((int) $this->month, (int) $this->day, (int) $this->year);
	}

	public function validate()
	{
		parent::validate();
		if (!$this->isValid()) {
			$this->addError('Invalid date');
		}
	}

}