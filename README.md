Validate
========

PHP Library Validate predetermined rules.

AutoLoad: PSR-0.
Example:

spl_autoload_register('load');
function load($className)
{
    if( file_exists( ( $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php') ) )
        require_once ( $filePath );
}

How usage:

$validate = new Validate\Validate();
$validate->addField('name', 'Felipe Barros')
			->addRule('required')
			->addRule('match_value', array('Felipe B'))
			->addRule('match_pattern', array('/\d/'))1
			->addField('idade', '18')
			->addRule('required')
			->addField('sobrenome', '')
			->addRule('required')
			->addField('email', 'felipe@gmail.com')
			->addRule('match_value', array('felipebarros@gmail.com'));



echo "<p>Number of errors: {$validate->get_errors()}</p>";

echo "<p>Number of tests: {$validate->get_tests()}</p>";

echo "<p>Number of sucess: {$validate->get_success()}</p>";

echo '<p>Error messages: ';
var_dump($validate->get_errors_msg());
echo '</p>';

Customize error messages: Edit the constants in the file RulesErrorMessage. 
