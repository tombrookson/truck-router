<?php namespace TruckRouter\DataModels;

class Depot extends DataModel
{
    static protected $table = 'depots';

    public static function insert($name = '')
    {
		$depot = static::db()->insert(static::$table, [
			"name" => $name,
		]);
        return $depot;
    }
}