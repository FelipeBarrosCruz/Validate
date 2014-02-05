<?php
/* USING PSR-0 */
spl_autoload_register('load');
function load($className)
{
    if( file_exists( ( $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php') ) )
        require_once ( $filePath );
}


$validate = new Validate\Validate();
$validate->addField('nome', 'Felipe Barros')
			->addRule('required')
			->addRule('match_value', array('Felipe B'))
			->addRule('match_pattern', array('/\d/'))
			->addField('age', '18')
			->addRule('required')
			->addField('document', '')
			->addRule('required')
			->addField('email', 'felipe@gmail.com')
			->addRule('match_value', array('felipebarros@gmail.com'));


echo "<p>Number of errors: {$validate->get_errors()}</p>";

echo "<p>Number of tests: {$validate->get_tests()}</p>";

echo "<p>Number of success: {$validate->get_success()}</p>";

echo '<p>Error messages: ';
var_dump($validate->get_errors_msg());
echo '</p>';