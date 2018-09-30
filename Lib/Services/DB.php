<?php namespace TruckRouter\Services;

use Medoo\Medoo;

class DB
{
	public static function connect()
	{
		$database = new Medoo([
			'database_type' => 'sqlite',
			'database_file' => 'database.sqlite',
			'option' => [
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
			]
		]);

		return $database;
	}

	public static function createTables()
	{
		$db = self::connect();

		$db->query('
		CREATE TABLE IF NOT EXISTS depots (
		  id INTEGER PRIMARY KEY,
		  name VARCHAR 
		)
		');

		$db->query('
		CREATE TABLE IF NOT EXISTS links (
		  id INTEGER PRIMARY KEY,
		  from_id INTEGER,
		  to_id INTEGER
		)
		');
	}
}