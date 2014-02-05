<?php
/**
 *  @Class : Validate
 *  @Autor : FelipeBarros<felipe.barros.pt@gmail.com>
 *  @Description : The Validate class is responsability to instance and invoke validators methods.
 *  @Version : 1.0 [05/02/2014]
 *
*/

namespace Validate;

class Validate
{
	private $status = TRUE;
	private $tests 	= 0;
	private $errors = 0;
	private $errors_msg = array();
	private $fields 	= array();

	public function addField($name, $value)
	{
		$this->name = $name;
		$this->fields[$name] = new namespace\Rules($name, $value);
		
		return $this;
	}

	public function addRule( $rule , $params = array())
	{
		$this->$rule($params);

		return $this;
	}

	public function __call($method, $params = array())
	{
		$this->processTest($method, $params);
	}

	private function processTest($method, $params)
	{
		if( !empty($params) )
			call_user_func_array( array($this->fields[$this->name], $method), $params[0] );
		else
			$this->fields[$this->name]->$method();

		$this->tests++;
	}

	private function setErrors()
	{
		if( !empty($this->fields) )
		{
			foreach($this->fields as $field => $fieldRules)
				$this->errors += $fieldRules->getErrors();
		}

		return $this->errors;
	}

	private function setErrorsMsg()
	{
		if( !empty($this->fields) )
			foreach($this->fields as $field => $fieldRules)
				if( !empty($fieldRules->getMsgErrors()) )
					foreach($fieldRules->getMsgErrors() as $message)
						array_push($this->errors_msg, $message);
	}

	public function get_status()
	{
		return ($this->get_errors() > 0) ? FALSE : TRUE;
	}

	public function get_tests()
	{
		return $this->tests;
	}

	public function get_errors()
	{
		$this->setErrors();

		return $this->errors;
	}

	public function get_success()
	{
		return $this->tests - $this->errors;
	}

	public function get_errors_msg()
	{
		$this->setErrorsMsg();

		return $this->errors_msg;
	}
}