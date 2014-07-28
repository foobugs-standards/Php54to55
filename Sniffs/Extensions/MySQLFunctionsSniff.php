<?php

/*
 * This file is part of the Php54to55 package.
 *
 * Copyright (c) 2013-2014, foobugs Oelke & Eichner GbR <mail@foobugs.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Php54to55\Sniffs\Extensions;

use Generic_Sniffs_PHP_DeprecatedFunctionsSniff;

/**
 * SQLite Functions search
 *
 * Searches for calls to the MySQL Extension functions that have been removed
 * from the default extensions in PHP 5.5.
 *
 * @package Php54to55
 * @author René Oelke <rene.oelke@foobugs.com>
 * @author Marcel Eichner <marcel.eichner@foobugs.com>
 * @author Maik Penz <maik.penz@foobugs.com>
 * @copyright 2013-2014 foobugs Oelke & Eichner GbR <mail@foobugs.com>
 * @license The MIT License (http://www.opensource.org/licenses/MIT)
 * @link Php54to55 (https://github.com/foobugs-standards/php54to55)
 */
class MySQLFunctionsSniff extends Generic_Sniffs_PHP_DeprecatedFunctionsSniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
        'PHP',
    );

    /**
     * A list of deprecated functions with their alternatives.
     *
     * The value is NULL if no alternative exists. IE, the
     * function should just not be used.
     *
     * @var array(string => string|null)
     */
    protected $forbiddenFunctions = array(
        'mysql_affected_rows' => null,
        'mysql_client_encoding' => null,
        'mysql_close' => null,
        'mysql_connect' => null,
        'mysql_create_db' => null,
        'mysql_data_seek' => null,
        'mysql_db_name' => null,
        'mysql_db_query' => null,
        'mysql_drop_db' => null,
        'mysql_errno' => null,
        'mysql_error' => null,
        'mysql_escape_string' => null,
        'mysql_fetch_array' => null,
        'mysql_fetch_assoc' => null,
        'mysql_fetch_field' => null,
        'mysql_fetch_lengths' => null,
        'mysql_fetch_object' => null,
        'mysql_fetch_row' => null,
        'mysql_field_flags' => null,
        'mysql_field_len' => null,
        'mysql_field_name' => null,
        'mysql_field_seek' => null,
        'mysql_field_table' => null,
        'mysql_field_type' => null,
        'mysql_free_result' => null,
        'mysql_get_client_info' => null,
        'mysql_get_host_info' => null,
        'mysql_get_proto_info' => null,
        'mysql_get_server_info' => null,
        'mysql_info' => null,
        'mysql_insert_id' => null,
        'mysql_list_dbs' => null,
        'mysql_list_fields' => null,
        'mysql_list_processes' => null,
        'mysql_list_tables' => null,
        'mysql_num_fields' => null,
        'mysql_num_rows' => null,
        'mysql_pconnect' => null,
        'mysql_ping' => null,
        'mysql_query' => null,
        'mysql_real_escape_string' => null,
        'mysql_result' => null,
        'mysql_select_db' => null,
        'mysql_set_charset' => null,
        'mysql_stat' => null,
        'mysql_tablename' => null,
        'mysql_thread_id' => null,
        'mysql_unbuffered_query' => null,
    );

    /**
     * If true, an error will be thrown; otherwise a warning.
     *
     * @var bool
     */
    public $error = true;
}
