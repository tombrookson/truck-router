<?php
	ini_set('max_execution_time', 300);
	ini_set('xdebug.max_nesting_level', 50000);

	require $_SERVER["DOCUMENT_ROOT"] . "/Lib/functions.php";
require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

\TruckRouter\Services\DB::createTables();

session_start();