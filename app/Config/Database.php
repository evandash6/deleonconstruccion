<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{

    public array $default;
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */

    /**
     * This database connection is used when
     * running PHPUnit database tests.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }

        switch ($_SERVER['SERVER_NAME']) {
            case 'deleonconstruccion.lamat.pro':
                $user = 'admin_deleon';
                $pass = 'W2ym02u~6';
            break;
            case 'deleon':
                $user = 'root';
                $pass = '2424123abc';
            break;
            default:
                $user = 'root';
                $pass = '';
            break;
        }


        $this->default = [
            'DSN'      => '',
            'hostname' => 'localhost',
            'username' => $user,
            'password' => $pass,
            'database' => 'deleonconstruccion',
            'DBDriver' => 'MySQLi', // o 'PDO' si prefieres usar PDO
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => (ENVIRONMENT !== 'production'),
            'cacheOn'  => false,
            'cachedir' => '',
            'charSet'  => 'utf8',
            'DBCollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => 3306,
            'saveQueries' => true,
        ];
    }
}
