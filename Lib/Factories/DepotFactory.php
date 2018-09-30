<?php namespace TruckRouter\Factories;

use TruckRouter\DataModels\Depot;

class DepotFactory
{
    public static function createDepots($num = 40)
    {
        for ($i=1;$i<=$num;$i++) {
            Depot::insert("Depot #" . $i);
        }
    }
}