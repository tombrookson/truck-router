<?php namespace TruckRouter\Services;


class Router
{
    public static function redirect($direction = "/")
    {
        header("Location: " . $direction);
        die();
    }
}