<?php

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
		return $this->day
			? new DateTime("$this->year-$this->month-$this->day")
			: NULL;
	}

}