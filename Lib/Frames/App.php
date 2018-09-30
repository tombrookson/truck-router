<?php namespace TruckRouter\Frames;

use TruckRouter\DataModels\Depot;
use TruckRouter\DataModels\Link;

class App
{
    public static function reset()
    {
        Depot::deleteAll();
        Link::deleteAll();
    }
}