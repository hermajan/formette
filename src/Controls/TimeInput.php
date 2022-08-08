<?php
namespace Formette\Controls;

class TimeInput extends DateTimeInput {
	protected $datetimeFormat = "H:i:s";
	
	protected $type = "time";
}
