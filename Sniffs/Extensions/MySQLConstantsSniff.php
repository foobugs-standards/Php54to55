<?php

/**
 * SQLite constant sniff
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Marcel Eichner // foobugs <marcel.eichner@foobugs.com>
 * @copyright 2012 foobugs oelke & eichner GbR
 * @license   BSD http://www.opensource.org/licenses/bsd-license.php
 * @link      https://github.com/foobugs/PHP53to54
 * @since     1.0-beta
 */

/**
 * Deprecated MySQL Constants Sniff
 *
 * Searches for constants provided by the mysql extension which was removed
 * in PHP 5.5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Marcel Eichner // foobugs <marcel.eichner@foobugs.com>
 * @copyright 2012 foobugs oelke & eichner GbR
 * @license   BSD http://www.opensource.org/licenses/bsd-license.php
 * @link      https://github.com/foobugs/PHP53to54
 * @since     1.0-beta
 */
class PHP54to55_Sniffs_Extensions_MySQLConstantsSniff
implements PHP_CodeSniffer_Sniff
{
    /** @inheritdoc */
    public $supportedTokenizers = array(
        'PHP',
    );

    /**
     * List of constants added by SQLite extension in PHP 5.4.
     *
     * @var array
     */
    protected $constants = array(
        'MYSQL_CLIENT_COMPRESS',
        'MYSQL_CLIENT_IGNORE_SPACE',
        'MYSQL_CLIENT_INTERACTIVE',
        'MYSQL_CLIENT_SSL',
        'MYSQL_ASSOC',
        'MYSQL_BOTH',
        'MYSQL_NUM',
    );

    /** @inheritdoc */
    public function register()
    {
        return array( T_STRING, );
    }

    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The current file being checked.
     * @param int                  $stackPtr  The position of the current token
     *                                         in the stack passed in $tokens.
     *
     * @return void
     * @see PHP_CodeSniffer_Sniff::process()
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $token = $tokens[$stackPtr];
        $constantName = $token['content'];

        // check if constant name is registered in the list of invalid names
        if (!in_array($constantName, $this->constants)) {
            return true;
        }

        // check if its a constant definition in a class
        $previousNotEmptyToken = $phpcsFile->findPrevious(
            PHP_CodeSniffer_Tokens::$emptyTokens,
            $stackPtr - 1, null, true
        );
        $previousToken = $tokens[$previousNotEmptyToken];
        if ($previousToken['code'] == T_CONST) {
            return true;
        }

        $phpcsFile->addError(
            sprintf(
                '%s from the mysql extension is not supported by PHP 5.5 anymore',
                $token['content']
            ),
            $stackPtr
        );
        return true;
    }
}