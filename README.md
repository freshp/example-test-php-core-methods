# example-test-php-core-methods
This package contains an example to test php core methods.

## why
* most of the time there is no need to change php-core-method-response
* sometimes it is enough to work with a facade-class which returns the method-results and the class could be mocked
* if there are many system checks in your code and you would like to test each scenario its getting tricky
* many solutions using I found use override_function or other magic methods where you manipulate the method at all
   * this dont work, if you need to return different responses on different calls
   * there is nothing wrong with the other ways I found, but they dont fit to my usecase
 * advantages:
    * you can test every path in your code
    * you can produce every situation without creating complex environments
    * you have the full handle above every built-in method
    * no need to change production code
 
## how
* you can [override built-in functions](https://www.php.net/manual/en/language.namespaces.fallback.php) in your current namespace
* since PHP5.3 with namespaces 

## how this way is getting impossible
* if you are using a leading backslash PHP is going to take the global built-in function.

example:
```
\date('Y-m-d')
```

## Execute PHPUnit tests
```
./vendor/bin/phpunit.phar -c ./phpunit.xml --testdox
```

## further reading
* https://www.php.net/manual/en/language.namespaces.fallback.php
* https://www.schmengler-se.de/en/2011/03/php-mocking-built-in-functions-like-time-in-unit-tests/
* https://www.php.net/manual/en/function.override-function.php or https://www.php.net/runkit_function_redefine

## other ways
* https://github.com/php-mock/php-mock
   * https://github.com/php-mock/php-mock-phpunit
   * https://github.com/php-mock/php-mock-mockery
   * https://github.com/php-mock/php-mock-prophecy
