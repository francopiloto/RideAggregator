<?php
	require "database.php";
	require "graph.php";
	
	$legs = findRoutes("origin","destination");
	
	$graph = new Graph();
	
	foreach ($legs as $leg) {
		$graph->addLeg($leg);
	}
	
	$routes = $graph->findPath(1, 3);	
	
	print_r($routes);
	
	/*header("Content-Type: application/json");
	$response = json_encode($routes);
	
	if ($response === false)
	{
		$errMsg = array("error" => json_last_error_msg());
		$response = json_encode($errMsg);
		
		http_response_code(500);
	}
	
	echo $response;*/
?>