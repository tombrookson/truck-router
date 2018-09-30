<?php require "./Lib/startup.php";

	$amount = isset($_GET['amount']) ? $_GET['amount'] : 200;

	\TruckRouter\Factories\DepotFactory::createDepots($amount);