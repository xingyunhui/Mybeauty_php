<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=10.94.120.190;dbname=MyBeauty',
	'emulatePrepare' => true,
	'username' => 'sofa_dev',
	'password' => '123456',
	'charset' => 'utf8',
);
