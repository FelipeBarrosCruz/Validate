<?php
namespace Validate;

interface IValidate
{
	public function get_status();

	public function get_success();

	public function get_errors();

	public function get_tests();

	public function get_errors_msg();
}