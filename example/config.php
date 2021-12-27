<?php
	return [
		'connections' => [

	        'sqlite' => [
	            'driver' => 'sqlite',
	            'url' => "",
	            'database' =>  "path to sqlite",
	            'prefix' => '',
	            'foreign_key_constraints' => true,
	        ],

	        'mysql' => [
	            'driver' => 'mysql',
	            'url' => "",
	            'host' => 'localhost',
	            'port' =>  '3306',
	            'database' => 'testing',
	            'username' => 'root',
	            'password' => 'root',
	            // 'unix_socket' => '',
	            'charset' => 'utf8mb4',
	            'collation' => 'utf8mb4_unicode_ci',
	            // 'prefix' => '',
	            // 'prefix_indexes' => true,
	            // 'strict' => true,
	            // 'engine' => null,
	            'options' => extension_loaded('pdo_mysql') ? array_filter([
	                PDO::MYSQL_ATTR_SSL_CA => getenv('MYSQL_ATTR_SSL_CA'),
	            ]) : [],
	        ],

	        'pgsql' => [
	            'driver' => 'pgsql',
	            'url' => "",
	            'host' => '127.0.0.1',
	            'port' => '5432',
	            'database' => 'postgre',
	            'username' => 'root',
	            'password' => '',
	            'charset' => 'utf8',
	            'prefix' => '',
	            'prefix_indexes' => true,
	            'schema' => 'public',
	            'sslmode' => 'prefer',
	        ],

	        'sqlsrv' => [
	            'driver' => 'sqlsrv',
	            'url' => '',
	            'host' => 'localhost',
	            'port' => '1433',
	            'database' => '',
	            'username' => '',
	            'password' => '',
	            'charset' => 'utf8',
	            'prefix' => '',
	            'prefix_indexes' => true,
	        ],

	    ],
	];