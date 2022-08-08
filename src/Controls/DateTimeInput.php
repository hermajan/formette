<?php
namespace Formette\Controls;

use Nette\Forms\Controls\TextInput;
use Nette\InvalidArgumentException;
use Nette\Utils\Html;

class DateTimeInput extends TextInput {
	protected $datetimeFormat = "Y-m-d H:i:s";
	
	protected $type = "datetime-local";
	
	public function setValue($value) {
		if($value instanceof \DateTimeInterface) {
			$this->value = $value->format($this->datetimeFormat);
		} else {
			if(is_null($value)) {
				$this->value = $value;
			} else {
				throw new InvalidArgumentException(sprintf("Value must be instance of \DateTimeInterface or null, %s given in field '%s'.", gettype($value), $this->name));
			}
		}
		
		$this->rawValue = $value;
		return $this;
	}
	
	public function getControl(): Html {
		$control = parent::getControl();
		$control->type = $this->type;
		
		return $control;
	}
	
	protected function getRenderedValue(): ?string {
		return empty($this->rawValue) ? $this->emptyValue : $this->rawValue->format($this->datetimeFormat);
	}
}
