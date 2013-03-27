PHP53to54
===============================================================================
This is a collection of sniffs for [PHP_CodeSniffer](http://pear.php.net/PHP_CodeSniffer) that check an PHP 5.4 application for PHP 5.5 compatibility.

**This project is currently under development**

# Features:
* Check for deprecated & removed functions (MySQL, mycryp_*)
* Check for `/e` modifier in regular expressions
* Check for removed Constants (MySQL)

# In Progress

# Detailed
* Check for calls to removed functions: `php_logo_guid`, `php_egg_logo_guid`, `php_real_logo_guid`, `zend_logo_guid`, `mcrypt_cbc`, `mcrypt_cfb`, `mcrypt_ecb`, `mcrypt_ofb`, `mysql_*`
* Check for usage of [deprecated MySQL constants](http://www.php.net/manual/en/mysql.constants.php: `MYSQL_CLIENT_COMPRESS`, `MYSQL_CLIENT_IGNORE_SPACE`, `MYSQL_CLIENT_INTERACTIVE`, `MYSQL_SSL`, `MYSQL_ASSOC`, `MYSQL_BOTH`, `MYSQL_NUM`

# Usage

	composer install
	vendor/bin/phpcs --standard=/Users/ephigenia/Sites/jagger/PHP54to55/ ./test

	vendor/bin/phpcs --standard=/Users/ephigenia/Sites/jagger/PHP54to55 --sniffs=PHP54to55.Deprecated.Functions ./test