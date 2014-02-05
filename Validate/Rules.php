<?php
/**
 *  @Class : Rules
 *  @Autor : FelipeBarros<felipe.barros.pt@gmail.com>
 *  @Description : The class is responsability to cotain the especific rules to use in validation.
 *  @Version : 1.0 [05/02/2014]
 *
*/
namespace Validate;

class Rules
{
	private $field;
	private $value;
	private $errors = 0;
	private $msg_errors = array();

	public function __construct($field, $value)
	{
		$this->field = $field;
		$this->value = $value;
	}

	public function required()
	{
		if(empty($this->value))
		{
			$this->errors++;
			$this->addErrorMsg($this->field, namespace\RulesErrorMessage::REQUIRED);
		}

		return $this;
	}

	public function match_value($compare, $flag = FALSE)
	{
		if($flag === TRUE)
			if($this->value !== $compare)
			{
				$this->errors++;
				$this->addErrorMsg($this->field, namespace\RulesErrorMessage::MATCH_VALUE_ONE);
			}

		if($flag === FALSE)
			if($this->value != $compare)
			{
				$this->errors++;
				$this->addErrorMsg($this->field, namespace\RulesErrorMessage::MATCH_VALUE_TWO);
			}

		return $this;
	}

	public function match_pattern($pattern)
	{
		if( !preg_match($pattern, $this->value) )
		{
			$this->errors++;
			$this->addErrorMsg($this->field, namespace\RulesErrorMessage::MATCH_PATTERN);
		}

		return $this;
	}

	public function getErrors()
	{
		return $this->errors;
	}
	
	public function getMsgErrors()
	{
		return $this->msg_errors;
	}
	
	private function addErrorMsg($field, $msg)
	{
		array_push($this->msg_errors, "The field {$field} {$msg}");
	}
}