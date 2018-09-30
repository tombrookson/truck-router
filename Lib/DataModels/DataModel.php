<?php namespace TruckRouter\DataModels;

use TruckRouter\Services\DB;

class DataModel
{
	static protected $table;
	static protected $idCount;

	public static function db()
	{
		try{
			return DB::connect();
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function find($id)
	{
		try{
			return static::db()->query('SELECT * FROM '.static::$table.' WHERE id = '.$id)->fetch();
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function has($id)
	{
		try{
			return DB::connect()->has($id);
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function all($col = null)
	{
		try{
			if($col){
				return static::db()->query('SELECT `'.$col.'` FROM '.static::$table)->fetchAll();
			}else{
				return static::db()->query('SELECT * FROM '.static::$table)->fetchAll();
			}
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function count()
	{
		try{
			return static::db()->query('SELECT COUNT(*) FROM '.static::$table)->fetch()[0];
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function delete($id)
	{
		try{
			return static::db()->delete(static::$table, ['id' => $id]);
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function deleteAll()
	{
		try{
			return static::db()->delete(static::$table, ['id[!]' => null]);
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function random()
	{
		try{
			return static::db()->query('SELECT * FROM '.static::$table.'
				ORDER BY RANDOM() LIMIT 1')->fetch();
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}
}