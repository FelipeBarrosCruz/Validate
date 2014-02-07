<?php
namespace Validate;

interface IRules
{
	public function getErrors();
	
	public function getMsgErrors();
}