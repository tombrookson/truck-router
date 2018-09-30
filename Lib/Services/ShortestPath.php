<?php namespace TruckRouter\Services;

use TruckRouter\DataModels\Link;

class ShortestPath
{
	public static function bfs_path($start, $end) {
		$queue = new \SplQueue();

		$queue->enqueue([$start]);

		$visited = [$start];
		while ($queue->count() > 0) {
			$path = $queue->dequeue();

			$node = $path[sizeof($path) - 1];

			if ($node === $end) {
				return $path;
			}
			foreach (Link::findByFrom($node) as $link) {
				$neighbour = $link['to_id'];
				if (!in_array($neighbour, $visited)) {
					$visited[] = $neighbour;

					$new_path = $path;
					$new_path[] = $neighbour;
					$queue->enqueue($new_path);
				}
			};
		}
		return false;
	}
}