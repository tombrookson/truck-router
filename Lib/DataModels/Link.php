<?php namespace TruckRouter\DataModels;

use TruckRouter\DataModels\Depot;

class Link extends DataModel
{
	static protected $idCount = 1;
	static protected $table = 'links';

	public static function insert($from, $to)
	{
		$depot = static::db()->insert(static::$table, [
			"from_id" => $from,
			"to_id" => $to
		]);
		return $depot;
	}

	public static function massInsert($array)
	{
		foreach(array_chunk($array, 50) as $arr){
			static::db()->insert(static::$table, $arr);
		}

		return true;
	}

    public static function exists($key)
    {
    	$links = $_SESSION['links'];

    	return array_key_exists($key, $links);
    }

    public static function findByFrom($id)
	{
		return static::db()->query('SELECT * FROM links WHERE from_id = '.$id)->fetchAll();
	}



    public static function maxLinks()
    {
        $depotCount = Depot::count();
		$maxLimit = 20;

        if ($depotCount > $maxLimit) {
            return $depotCount / $maxLimit;
        } else {
            return 1;
        }
    }
}