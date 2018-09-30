<?php require "./Lib/startup.php";

	use TruckRouter\DataModels\Depot;
	use TruckRouter\DataModels\Link;
	use TruckRouter\Services\ShortestPath;

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

	$returnString = '';

	foreach(ShortestPath::bfs_path($from, $to) as $key=>$pathItem){
		$depot = Depot::find($pathItem);

		if($key == 0){
			$returnString .= '<em>'.$depot['name'].'</em>';
		}else{
			$returnString .= ' to <em>'.$depot['name'].'</em>';
		}
	}

	echo $returnString;



