<?php namespace TruckRouter\Factories;

use TruckRouter\DataModels\Depot;
use TruckRouter\DataModels\Link;

class LinkFactory
{
    public static function createLinks()
    {
        $depots = Depot::all();
        $maxLinks = Link::maxLinks();

		$_SESSION['links'] = [];

        foreach ($depots as $depot) {
            $from = $depot;

            $i = 1;
            while ($i<=$maxLinks) {
                self::createLink($from, $depots);

                $i++;
            }
        }

		Link::massInsert($_SESSION['links']);

		$_SESSION['links'] = [];
    }

    private static function createLink($from, $depots)
	{
		$to = $depots[array_rand($depots, 1)];

		$new = [
			'from_id' => $from['id'],
			'to_id' => $to['id']
		];

		if(Link::exists($from['id']*$to['id'])){
			self::createLink($from, $depots);
		}else{
			$_SESSION['links'][$from['id']*$to['id']] = $new;
		}
	}
}