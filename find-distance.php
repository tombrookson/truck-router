<?php require "./Lib/startup.php";

	use TruckRouter\DataModels\Depot;
	use TruckRouter\DataModels\Link;

	if(
		!isset($_GET['from']) ||
		!isset($_GET['to']) ||
		!$_GET['from'] ||
		!$_GET['to']){
		echo 'Please select two depots to find a route';
		die;
	}

	$from = $_GET['from'];
	$to = $_GET['to'];

	function bfs_path($start, $end) {
		$queue = new SplQueue();

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

	$returnString = '';

	foreach(bfs_path($from, $to) as $key=>$pathItem){
		$depot = Depot::find($pathItem);

		if($key == 0){
			$returnString .= '<em>'.$depot['name'].'</em>';
		}else{
			$returnString .= ' to <em>'.$depot['name'].'</em>';
		}
	}

	echo $returnString;



