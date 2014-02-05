<?php
/**
 *  @Class : RulesErrorMessage
 *  @Autor : FelipeBarros<felipe.barros.pt@gmail.com>
 *  @Description : The class is responsability to contain the erro messages to use in dispatch error.
 *  @Version : 1.0 [05/02/2014]
 *
*/
namespace Validate;

class RulesErrorMessage
{
	const REQUIRED 		= 'can\'t be empty!';
	const MATCH_VALUE_ONE 	= 'is not equal in value and type!';
	const MATCH_VALUE_TWO 	= 'is not equal!';
	const MATCH_PATTERN 	= 'don\'t match pattern!';
}
