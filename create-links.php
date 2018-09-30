<?php require "./Lib/startup.php";
	\TruckRouter\Factories\LinkFactory::createLinks();

	prp(count($_SESSION['links']));

	prp(count(array_unique($_SESSION['links'], SORT_REGULAR)));exit;